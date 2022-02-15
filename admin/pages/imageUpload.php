<link type="text/css" href="bulkuploader/multiple_file_upload/css/uploader.css" rel="stylesheet" />
<style type="text/css">
  .heading{
    font-size: 25px !important;
    font-weight: 700;
  }
</style>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><?php echo $title; ?></h1>
  </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
            <h4 class="text-danger">Instructions for Uploading Images:</h4>
            <p>For a single file, click "Choose Files" then select your image. To upload multiple files, press Ctrl on your keyboard and select file one by one or you can mouse select all the files to upload. Note that only files with the filename which is included in the bulk upload page will be uploaded.</p>
            <form name="fileUpload" id="fileUpload" action="javascript:void(0);" enctype="multipart/form-data">
                <div class="form-group row">
                    <label class="col-2">Select Images:</label>
                    <div class="col-4">
                        <input type="file" name="multiple_files[]" id="_multiple_files" multiple>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-6 text-right">
                        <input type="submit" value="Upload" class="btn btn-success">
                        <input type="button" value="Clear Form" onClick="window.location='fileUpload.php?defelem=1'" class=" btn btn-danger">
                    </div>
                </div><div class="form-group row">
                    <div class="col-6 text-right">
                        <div class="file_boxes" style="min-height:100px"></div>
								<span id="removed_files"></span>
                    </div>
                </div>
            </form>

        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
     <!-- <script type="text/javascript" src="<?php echo BASE_URL ?>admin/bulkuploader/multiple_file_upload/js/jquery_1.5.2.js"></script>-->
    <script type="text/javascript" src="<?php echo BASE_URL ?>admin/bulkuploader/multiple_file_upload/js/uploader.js"></script>
 
  <script type="text/javascript">
    $(document).ready(function() {
        var baseUrl = '<?php echo BASE_URL ?>';
        new multiple_file_uploader ({
            form_id: "fileUpload", 
            autoSubmit: true,
            server_url: baseUrl+"/admin/bulkuploader/multiple_file_upload/uploader.php" 
        });
    }); 
</script>