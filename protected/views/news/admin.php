<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'Quản lí',
);

$this->menu=array(
	array('label'=>'Tạo mới', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('news-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Quản lí Tin tức</h1>

<?php echo CHtml::link('Tìm kiếm nâng cao','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'news-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'filter'=>$model,
        'summaryText'=>'Số sản phẩm từ {start}-{end} (trong tổng số {count} sản phẩm)',
        'template'=>'{summary}{items}{pager}',
        'pager'=>array(
                'header'=>'',
                'prevPageLabel'=>'« Trước',
                'nextPageLabel'=>'Tiếp theo »',
        ),
	'columns'=>array(
                array(
                    'name' => 'image_url',
                    'type' => 'raw',
                    'value' => 'CHtml::image( Yii::app()->request->baseUrl."/images/".$data->image_url,"",array("width"=>"100px"))', 
                ),
		'title',
		'description',
		'content',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
