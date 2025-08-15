<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/css/main.css?v=04">
	<title><?=lang('Home.title'); ?></title>
	<meta property="og:title" content="<?=lang('Home.title'); ?>" />
	<meta property="og:description" content="" />
	<meta property="og:site_name" content="<?=lang('Home.title'); ?>" />
	<meta property="og:image" content="<?=base_url('img/rf.jpg'); ?>" />
	<link rel="image_src" href="<?=base_url('img/rf.jpg'); ?>" />
	<meta name="facebook-domain-verification" content="8anhrlh0zfi1gooed3xwu4w8tt3igz" />
	<meta name="p:domain_verify" content="e8782fa8c8962b145c2325292e27a0da"/>
	<!-- Google tag (gtag.js) <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZC6ZC99L2R"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-ZC6ZC99L2R'); </script>
	<script>
		!function (w, d, t) {
			w.TiktokAnalyticsObject=t;var ttq=w[t]=w[t]||[];ttq.methods=["page","track","identify","instances","debug","on","off","once","ready","alias","group","enableCookie","disableCookie"],ttq.setAndDefer=function(t,e){t[e]=function(){t.push([e].concat(Array.prototype.slice.call(arguments,0)))}};for(var i=0;i<ttq.methods.length;i++)ttq.setAndDefer(ttq,ttq.methods[i]);ttq.instance=function(t){for(var e=ttq._i[t]||[],n=0;n<ttq.methods.length;n++
	)ttq.setAndDefer(e,ttq.methods[n]);return e},ttq.load=function(e,n){var i="https://analytics.tiktok.com/i18n/pixel/events.js";ttq._i=ttq._i||{},ttq._i[e]=[],ttq._i[e]._u=i,ttq._t=ttq._t||{},ttq._t[e]=+new Date,ttq._o=ttq._o||{},ttq._o[e]=n||{};n=document.createElement("script");n.type="text/javascript",n.async=!0,n.src=i+"?sdkid="+e+"&lib="+t;e=document.getElementsByTagName("script")[0];e.parentNode.insertBefore(n,e)};
			
			ttq.load('CMO18FBC77UE8SFFGDT0');
			ttq.page();
			}(window, document, 'ttq');
	</script> -->


<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-11463341331"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-11463341331');
</script>
<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1405519053692460');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1405519053692460&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->
</head>
<body>
	<?= $this->include('partials/header') ?>
	<?= $this->renderSection('content') ?>
	<?= $this->include('partials/footer') ?>
	<?= $this->include('partials/modal') ?>
	<?= $this->include('partials/modal-video') ?>

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="/owlcarousel/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="/owlcarousel/assets/owl.theme.default.min.css">
	<link rel="stylesheet" href="/owlcarousel/assets/owl.css">
	<script src="/owlcarousel/owl.carousel.min.js"></script>
	
	<script src="/js/main.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/hls.js@1"></script>
	<script>
		const videos = document.querySelectorAll('.videoS');
		videos.forEach((video) => {
			let videoSrc = video.getAttribute("data-src");
			if (video.canPlayType('application/vnd.apple.mpegurl')) {
			video.src = videoSrc;
			} else if (Hls.isSupported()) {
				var hls = new Hls();
				hls.loadSource(videoSrc);
				hls.attachMedia(video);
			}
		});   		
	</script>	
</body>
</html>