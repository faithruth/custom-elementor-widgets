
<div class="uap-banner-slider">
    <?php foreach ($settings['banner'] as $banner){ ?>
        <div class="uap-banner-entry">
        <div class="row justify-content-between">
        <div class="partner-logo-wrapper col-lg-6 my-auto px-3 py-lg-5 px-lg-0">
            <img width="100%" height="321" src="<?php echo $banner['banner_image']['url']; ?>" />
        </div>
		<div class="partner-description col-lg-5 pb-5 p-lg-4">
			<div class="text-wrapper text-center">
						<h3 class="banner-title mt-lg-5"><?php echo $banner['title'] ?></h3>
						<div class="borderline"></div>
						<p class="banner-description welcomePrompt"><?php echo $banner['description'] ?></p>
						<a href="<?php echo $banner['link'] ?>" class="btn btn-block btn-blue-overlay btn-bold btn-pad mt-4 mt-lg-3 mb-3"><?php echo $banner['button_text'] ?></a>
					</div>
			</div>
		</div>
        </div>

    <?php } ?>
</div>