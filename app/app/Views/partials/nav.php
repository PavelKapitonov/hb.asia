<nav>
	<div class="act">
		<?=lang('Nav.title-16'); ?>
		<p>
			<span class="red">
				<span class="content">
					<? 
						$items = model(CategoriesModel::class)->orderBy('sort', 'asc')->find();
						foreach($items as $i):
							$text = model(CategoriesTextModel::class)->getTextLang($i['id'], $locale);	
					?>
						<a href="/<?= $locale; ?>/catalog/<?= $i['slug']; ?>"><?= $text['title']; ?></a>
					<? endforeach; ?>							
				</span>									
			</span>
		</p>
	</div>					
	<div><?=lang('Nav.title-02'); ?>
		<p>
			<span class="red">
				<span class="content">
						<a href="/<?= $locale; ?>/aboutus"><?=lang('Nav.title-17'); ?></a>
						<a href="/<?= $locale; ?>/healingbowl"><?=lang('Nav.title-03'); ?>®</a>
						<a href="/<?= $locale; ?>/documents"><?=lang('Nav.title-05'); ?></a>
						<a href="/<?= $locale; ?>/contacts"><?=lang('Nav.title-06'); ?></a>									
				</span>									
			</span>
		</p>
	</div>
	<div><?=lang('Nav.title-18'); ?>
		<p>
			<span class="red">
				<span class="content">
						<a href="<?= base_url($locale.'/knowledge-base '); ?>"><?=lang('Nav.title-11'); ?></a>
						<a href="<?= base_url($locale.'/catalog/video-courses'); ?>"><?=lang('Nav.title-19'); ?></a>
						<a href="<?= base_url($locale.'/catalog/video-modules'); ?>"><?=lang('Nav.title-22'); ?></a>

				</span>									
			</span>
		</p>
	</div>					
	<a href="/<?= $locale; ?>/spa"><?=lang('Nav.title-07'); ?></a>
</nav>