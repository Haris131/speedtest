<?php
@system("clear");

function formatBytes($bytes, $precision = 1){
	$units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];
	$bytes = max($bytes, 0);
	$pow = min(floor(($bytes ? log($bytes) : 0) / log(1024)), count($units) - 1);
	$bytes /= pow(1024, $pow);
return round($bytes, $precision).' '.$units[$pow];
}

function getStr($string,$start,$end){
	$ex = explode($start,$string);
	$ex = explode($end,$ex[1]);
return $ex[0];
}

function pornhub($url){
	@system("curl --doh-url https://dns.adguard.com/dns-query -s -o pord.html ".$url);
	$html = file_get_contents("pord.html");
	
	$parse = getStr($html,'var flashvars_',';');
	$parse2 = getStr($parse,'= {',',"mediaDefinitions');
	$js = json_decode("{".$parse2."}",true);
	$data = ["title"=>$js['video_title'],"thumbnail"=>$js['image_url']];
	echo "Title : ".$data['title']."\n";
	
	$pars = getStr($html,'<div class="video-wrapper">','</div>');
	$pars2 = getStr($pars,'qualityItems_',';');
	$pars3 = getStr($pars2,"= [{","}]");
	$vid = json_decode("[{".$pars3."}]",true);
	print_r($vid)."\n";
	foreach ($vid as $val){
		if ($val['text']=="480p"){
			echo "Size : ".formatBytes(get_headers($val['url'],true)['Content-Length'])."\n";
			echo $val['url']."\n";
			#@system("rm -rf pord.html");
			exit;
			}
		}
}

function xnxx($url){
	@system("curl --doh-url https://dns.adguard.com/dns-query -s -o xnxx.html ".$url);
	$dx = file_get_contents("xnxx.html");
	$title = getStr($dx,"html5player.setVideoTitle('","');");
	if ($title){
		$low = getStr($dx,"html5player.setVideoUrlLow('","');");
		$high = getStr($dx,"html5player.setVideoUrlHigh('","');");
		$hls = getStr($dx,"html5player.setVideoHLS('","');");
		echoColoredString($title,"green");
		echo "Size : ".formatBytes(get_headers($high,true)['Content-Length'])."\n";
		echo $high."\n";
		@unlink("xnxx.html");
		exit;
		}
}

$url = "https://www.pornhub.com/view_video.php?viewkey=ph61aa24888d05a";
#https://www.xnxx.com/video-13y9fze2/23639515/0/masturbation_of_a_hot_babe_from_thailand_with_big_fake_tits
#http://www.qqxnxx.com/107474/download-masturbation-of-a-hot-babe-from-thailand-with-big-fake-tits.html

$js = "https://www.pornhub.com/view_video.php?viewkey=ph5fdacdedcb90c
https://www.pornhub.com/view_video.php?viewkey=ph5d45cacf0111f
https://www.pornhub.com/view_video.php?viewkey=ph5fe50b673a291
https://www.pornhub.com/view_video.php?viewkey=ph5cba6ef4dbc0a
https://www.pornhub.com/view_video.php?viewkey=ph5dd7b3429997f
https://www.pornhub.com/view_video.php?viewkey=ph5cf6fec5b0fb6
https://www.pornhub.com/view_video.php?viewkey=ph6164564b4ac8f
https://www.pornhub.com/view_video.php?viewkey=ph61d75fd3b6973
https://www.pornhub.com/view_video.php?viewkey=ph5ecfd57a2698a
https://www.pornhub.com/view_video.php?viewkey=ph602d29b697b36
https://www.pornhub.com/view_video.php?viewkey=ph6123fd890cd4e
https://www.pornhub.com/view_video.php?viewkey=ph5cdf07d5bbe31
https://www.pornhub.com/view_video.php?viewkey=ph5e5866a54b458
https://www.pornhub.com/view_video.php?viewkey=ph617971a8f2b4f
https://www.pornhub.com/view_video.php?viewkey=ph60ff86b18d083
https://www.pornhub.com/view_video.php?viewkey=ph613d009496765
https://www.pornhub.com/view_video.php?viewkey=ph5ff6f69248485
https://www.pornhub.com/view_video.php?viewkey=ph5ff7898766fb2
https://www.pornhub.com/view_video.php?viewkey=ph5ff9aa993dfbe
https://www.pornhub.com/view_video.php?viewkey=ph602e99d29decb
https://www.pornhub.com/view_video.php?viewkey=ph617f24824d49a
https://www.pornhub.com/view_video.php?viewkey=ph61bf366d34811
https://www.pornhub.com/view_video.php?viewkey=ph61a5abe61a600
https://www.pornhub.com/view_video.php?viewkey=ph61a7a2e289f98
https://www.pornhub.com/view_video.php?viewkey=ph5ee8b9c4f0e13";

if ($argv[1]){
	$url = filter_var($argv[1], FILTER_SANITIZE_URL);
	if (filter_var($url, FILTER_VALIDATE_URL) === false){
		echo "Error.\n";
		echo "URL Tidak Valid.\n";
		exit;
		}
	if (explode("pornhub",$url)[1]){
		pornhub($url);
		}
	else if (explode("xnxx",$url)[1]){
		xnxx($url);
		}
	else {
		echo "URL Tidak Terdeteksi.\n";
		exit;
		}
	}
else {
	echo "No arguments passed.\n";
	echo 'Example "php asupan.php "url_video_pornhub_or_xnxx"'.PHP_EOL;
	exit;
	}

?>