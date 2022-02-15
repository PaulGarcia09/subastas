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
            <h4 class="text-danger">Instructions for Uploading CSV using Excel File Template:</h4>
            <p>“Download the excel file template thru the downlink below, fill in the table. Please note that the filename of image should be the actual filename (e.g. image1.jpg). Do not use commas (,) and single (') quotation marks in the spreadsheet.</p>
            <p>Save As as CSV (Comma delimited) (.csv) type (click the file type dropdown button then click yes on confirmation prompt). Browse to select the file then click Upload button. To upload images click on the Image Files Uploader Tab.” .</p>
            <div class="my-3">
                <a href="<?php echo BASE_URL; ?>admin/bulkuploader/bulkFiles/bulkform.xls"><img src="<?php echo PUBLIC_URL; ?>images/excel_icon.jpg" height="20" valign="bottom">&nbsp;&nbsp;<span style="font-size:14px; font-weight:bold;">Download Excel File Template</span></a>                           
            </div>
            <form name="csvUpload" id="csvUpload" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label class="col-2">Select Auction Event</label>
                    <select name="event" id="event" class="form-control col-4">
                        <option value="">Select Event</option>
                        <?php foreach($events as $value) { ?>
                            <option value="<?php echo $value['f_start_date']; ?>"><?php echo $value['f_title']; ?></option>
                        <?php } ?>  
                    </select>
                </div>
                <div class="form-group row">
                    <label class="col-2">Select CSV File</label>
                    <input type="file" name="userfile" class="col-4">
                </div>
                <div class="form-group row">
                    <div class="col-6 text-right">
                        <input type="submit" name="upload" value="Upload" class="btn btn-success">
                        <input type="button" value="Clear Form" onClick="window.location='fileUpload.php?defelem=1'" class=" btn btn-danger"> 
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

  <script type="text/javascript">
    $(document).ready(function(e) {
        $("#csvUpload").on('submit',(function(e) {
            var baseUrl = '<?php echo BASE_URL; ?>';
            e.preventDefault();         
            $.ajax({
                url: baseUrl+"/admin/bulkuploader/uploader.php", 
                type: "POST",             
                data: new FormData(this),
                async: false,
                contentType: false,       
                cache: false,             
                processData:false,        
                success: function(result) {     
                    var response = eval('('+result+')');
                    alert(response.message);
                    if (response.result=='success') {   
                        window.location.reload();
                    }   
                }
            });
        }));
    }); 
</script>