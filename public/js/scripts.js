$(document).ready(function() {
	$('form').on('submit', function() {
		var form = $(this);
		$('.modal').modal('hide');

		var title_attr = form.attr('data-modal-title');
		if( typeof title_attr !== 'undefined' && title_attr !== false && title_attr != '' ) {
			var title = form.attr('data-modal-title');
		} else {
			var title = 'Submitting the form';
		}

		var body_attr = form.attr('data-modal-body')
		if( typeof body_attr !== 'undefined' && body_attr !== false && title_attr != '' ) {
			var body = form.attr('data-modal-body');
		} else {
			var body = 'Please wait while we submit the form...';
		}
		showModal(title, body);
	});
});

function showModal(title, body) {
	$('#generic_loading_modal_title').html(title);
	$('#generic_loading_modal_body').html(body);
	$('#generic_loading_modal').modal({
		backdrop: 'static',
		keyboard: false
	});
}

function closeModal() {
	$('#generic_loading_modal').modal('hide');
}

function ajaxCall(url, data, success) {
	$.ajax({
		dataType: "json",
		type: "POST",
		url: url,
		data: data,
	}).done(function(msg) {
		return success(msg);
	});
}

Handlebars.registerHelper('parseEmoticons', function(text) {
    return parseEmoticons(text)
});

function parseEmoticons(a){var b=[{text:"(allthethings)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/allthethings.png"},{text:"(areyoukiddingme)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/areyoukiddingme.png"},{text:"(awyeah)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/awyea.png"},{text:"(awthanks)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/awthanks.png"},{text:"(badass)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/badass.png"},{text:"(badpokerface)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/badpokerface.png"},{text:"(cake)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/cake.png"},{text:"(caruso)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/caruso.png"},{text:"(cereal)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/cerealguy.png"},{text:"(challengeaccepted)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/challengeaccepted.png"},{text:"(chucknorris)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/chucknorris-1342735388.png"},{text:"(content)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/content.png"},{text:"(dealwithit)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/dealwithit.gif"},{text:"(derp)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/derp.png"},{text:"(disapproval)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/disapproval.png"},{text:"(dosequis)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/dosequis.png"},{text:"(drevil)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/drevil.png"},{text:"(ducreux)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/ducreux.png"},{text:"(dumb)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/dumbbitch.png"},{text:"(facepalm)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/facepalm.png"},{text:"(fap)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/fap.png"},{text:"(firstworldproblem)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/firstworldproblem-1342647915.png"},{text:"(foreveralone)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/foreveralone.png"},{text:"(freddie)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/freddie.png"},{text:"(fry)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/fry.png"},{text:"(fuckyeah)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/fuckyeah.png"},{text:"(fwp)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/fwp-1342647892.png"},{text:"(goodnews)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/farnsworth.png"},{text:"(gtfo)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/gtfo.png"},{text:"(hipster)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/hipster.png"},{text:"(ilied)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/ilied.png"},{text:"(indeed)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/indeed.png"},{text:"(itsatrap)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/6/itsatrap.png"},{text:"(jackie)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/jackie.png"},{text:"(lol)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/lol.png"},{text:"(megusta)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/megusta.png"},{text:"(notbad)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/notbad.png"},{text:"(nothingtodohere)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/nothingtodohere.png"},{text:"(notsureif)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/notsureif-1342015652.png"},{text:"(ohcrap)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/ohcrap.png"},{text:"(ohgodwhy)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/ohgodwhy.jpeg"},{text:"(okay)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/okay.png"},{text:"(omg)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/omg.png"},{text:"(orly)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/orly.png"},{text:"(philosoraptor)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/philosoraptor.png"},{text:"(pokerface)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/pokerface.png"},{text:"(rageguy)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/rageguy.png"},{text:"(fu)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/rageguy.png"},{text:"(rebeccablack)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/rebeccablack.png"},{text:"(sadtroll)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/sadtroll.png"},{text:"(scumbag)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/scumbag.png"},{text:"(stare)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/stare.png"},{text:"(sweetjesus)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/sweetjesus.png"},{text:"(troll)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/troll.png"},{text:"(truestory)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/truestory.png"},{text:"(wat)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/wat.png"},{text:"(wtf)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/wtf.png"},{text:"(yey)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/yey.png"},{text:"(yodawg)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/yodawg.png"},{text:"(yuno)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/yuno.png"},{text:"(zoidberg)",link:"https://dujrsrsgsd3nh.cloudfront.net/img/emoticons/zoidberg.png"}];for(var c in b){var d=regExQuote(b[c].text);var e=new RegExp(d,"gi");a=a.replace(e,'<img alt="'+b[c].text+'" src="'+b[c].link+'" title="'+b[c].text+'" rel="tooltip" class="emoticon" />')}return a}

function getAlertHtml(variables)
{
    var alert_box_template = Handlebars.compile($('#alert-box').html());
    return alert_box_template(variables);
}

function regExQuote(str) {
    return str.replace(/([.?*+^$[\]\\(){}|-])/g, "\\$1");
}

function arrayRemove(array, from, to) {
  var rest = array.slice((to || from) + 1 || array.length);
  array.length = from < 0 ? array.length + from : from;
  return array.push.apply(array, rest);
};