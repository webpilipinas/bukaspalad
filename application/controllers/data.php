<?php
class Data_Controller extends Base_Controller
{
    public $restful = true;

    public function __construct()
    {
        parent::__construct();
        $this->filter('before', 'auth');
    }

    public function post_stocks()
    {
        $sku = Input::get('sku');
        $unit = Input::get('unit');

        $stock = array();
        foreach($sku as $k => $sk) {
            $un = $unit[$k];
            $stock = Stock::upsertStock($sk, $un);
            if( !empty($stock) ) {
                $added[] = $stock;
            }
        }

        if( count($added) > 0 ) {
            Event::fire('stock_add', array(
                $added,
                Auth::user()
            ));
        }

        Session::flash('success', 'Successfully created new stock.');
        return Redirect::to('dashboard');
    }

    public function get_load_default_stocks()
    {
        $default = array(
            array(
                'sku' => 'Rice',
                'unit' => 'Sacks'
            ),
            array(
                'sku' => 'Canned Food',
                'unit' => 'Cans'
            ),
            array(
                'sku' => 'Bottled Water',
                'unit' => 'Bottles'
            ),
            array(
                'sku' => 'Gallon Water',
                'unit' => 'Containers'
            ),
            array(
                'sku' => 'Snacks',
                'unit' => 'Bags'
            ),
            array(
                'sku' => 'Clothes',
                'unit' => 'Bags'
            ),
        );

        $created_at = date('Y-m-d H:i:s');
        foreach($default as &$d) {
            $d['created_at'] = $created_at;
            $d['updated_at'] = $created_at;
        }
        Stock::insert($default);

        Event::fire('stock_add', array(
            $default,
            Auth::user()
        ));

        Session::flash('success', 'Successfully loaded default stock types.');
        return Redirect::to('dashboard');
    }

    public function post_donation()
    {
        $donator = Input::get('donator');
        $stock_ids = Input::get('stock_id');
        $units = Input::get('units');

        $stock = array();
        $donation = new Donation();
        $donation->fill(array(
            'donator' => $donator,
        ));
        $donation->save();

        foreach($stock_ids as $k => $sid) {
            $un = $units[$k];
            $dc = new DonationContent();
            $dc->fill(array(
                'donation_id' => $donation->id,
                'stock_id' => $sid,
                'amount' => $un
            ));
            $dc->save();
        }

        Event::fire('donation_added', array(
            $donation,
            Auth::user()
        ));

        Session::flash('success', 'Successfully created a new donation');
        return Redirect::to('dashboard');
    }

    public function post_package()
    {
        $area = Input::get('area');
        $packs = Input::get('packs');

        $package = new Package();
        $package->area = $area;
        $package->packs = $packs;
        $package->save();

        Event::fire('package_added', array(
            $package,
            Auth::user()
        ));

        Session::flash('success', 'Successfully created a new package');
        return Redirect::to('dashboard');
    }

    public function post_repack()
    {
        $donation_id = Input::get('donation_id');
        $package_id = Input::get('package_id');

        $donation = Donation::find($donation_id);
        $donation->package_id = $package_id;
        $donation->is_repacked = 1;
        $donation->save();

        Event::fire('donation_repacked', array(
            $donation,
            Auth::user()
        ));

        Session::flash('success', 'Successfully marked donation as repacked.');
        return Redirect::to('dashboard');
    }

    public function post_transport()
    {
        $transport_name = Input::get('transport_name');
        $car_type = Input::get('car_type');

        $transport = new Transport();
        $transport->name = $transport_name;
        $transport->car_type = $car_type;
        $transport->save();

        Event::fire('transport_added', array(
            $transport,
            Auth::user()
        ));

        Session::flash('success', 'Successfully registered a new transport');
        return Redirect::to('dashboard');
    }

    public function get_transport_availability($tid, $avail)
    {
        $transport = Transport::find($tid);
        $transport->is_available = $avail;
        $transport->save();

        Event::fire('transport_availability', array(
            $transport,
            Auth::user()
        ));

        Session::flash('success', 'Successfully changed transport availability.');
        return Redirect::to('dashboard');
    }

    public function post_marktransport()
    {
        $transport_id = Input::get('transport_id');
        $package_id = Input::get('transport_package_id');

        $package = Package::find($package_id);
        $package->is_transported = 1;
        $package->transport_id = $transport_id;
        $package->save();

        $mark_as_unavailable = Input::get('mark_as_unavailable');
        if( !empty($mark_as_unavailable) ) {
            $transport = Transport::find($transport_id);
            $transport->package_id = $package_id;
            $transport->is_available = 0;
            $transport->save();

            Event::fire('transport_availability', array(
                $transport,
                Auth::user()
            ));
        }

        Event::fire('packaged_marked', array(
            $package,
            Auth::user()
        ));

        Session::flash('success', 'Successfully marked package as transported.');
        return Redirect::to('dashboard');
    }
}