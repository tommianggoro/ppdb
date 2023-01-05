<?php if(!empty($this->data['breadcrumbs'])): ?>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <?php foreach($this->data['breadcrumbs'] as $key => $value): ?>
                <li class="breadcrumb-item"><a href="<?php echo $value['link']; ?>"><?php echo $value['title']; ?></a></li>
            <?php endforeach; ?>
        </ol>
    </div><!-- /.col -->
<?php endif; ?>