<?php if(!empty($this->data['breadcrumbs'])): ?>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <?php foreach($this->data['breadcrumbs'] as $key => $value): ?>
                <li class="breadcrumb-item">
                	<?php if(!empty($value['link'])) : ?>
                		<a href="<?php echo $value['link']; ?>">
                	<?php endif; ?>
                		<?php echo $value['title']; ?>
                	<?php if(!empty($value['link'])) : ?>
                		</a>
                	<?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ol>
    </div><!-- /.col -->
<?php endif; ?>