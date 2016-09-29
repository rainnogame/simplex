<?
use app\assets\ReactAssets;
use app\assets\RequireJsAsset;
use app\assets\TodoAssets;

ReactAssets::register($this);
TodoAssets::register($this);
RequireJsAsset::register($this);
?>
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Tasks</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div id="app-content">
        
        </div>
    </div>

</div>