<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
  </div>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <div class="member-img">
            <img class="img-thumbnail img-responsive" src="<?php echo HOME_URL ?>rimage/products/<?php echo $result['f_primary_image'] ?>.e.jpg" alt="First slide">
          </div>
          <div>
            <h4>Aution Information</h4>
            <p class="ml-3">Lot Title: <?php echo $result['f_title'] ?></p>
            <p class="ml-3">Lot Number: <?php echo $result['f_number'] ?></p>
            <p class="ml-3">High Bidder: <?php echo $result['f_bid_user_name'] ?></p>
            <p class="ml-3">High Bid: <?php echo $result['f_current_bid'] ?></p>
            <p class="ml-3">Bid Increment: <?php echo $result['f_bid_increment'] ?></p>
            <p class="ml-3">Reserve Bid: <?php echo $result['f_reserve_bid'] ?></p>
            <p class="ml-3">Message: <?php echo $result['f_message'] ?></p>
          </div>       
        </div>
        <div class="col">
          <div>
            <h4>Controls</h4>
          </div>
            <div class="form-group row">
              <label class="col-12">Message 
                <span class="btn btn-info btn-sm btn-script-update" data-type="message" data-data="Start Bidding">Start Bidding</span>
                <span class="btn btn-info btn-sm btn-script-update" data-type="message" data-data="Fair Warning">Fair Warning</span>
                <span class="btn btn-info btn-sm btn-script-update" data-type="message" data-data="Lot Sold">Lot Sold</span>
              </label>
              <div class="col-9">
                <input type="text" class="form-control" placeholder="Message" id="message" name="message">
              </div>
              <div class="col-3">
                <span class="btn btn-success btn-script-update" data-type="message" data-data="message">Send</span>
              </div>
            </div>
            <div class="form-group row mt-4">
              <?php 
                  $firstBid = ( (int)$result['f_current_bid']+(int)$result['f_bid_increment']);
                  $secondBid = ( $firstBid+(int)$result['f_bid_increment']);
                  $thirdBid = ( $secondBid+(int)$result['f_bid_increment']);
                ?>   
              <label class="col-12 col-form-label">Quick Bid
                <span class="btn btn-primary btn-sm btn-script-update" data-type="bid" data-data="<?php echo $firstBid; ?>"><?php echo $firstBid; ?></span>
                <span class="btn btn-primary btn-sm btn-script-update" data-type="bid" data-data="<?php echo $secondBid; ?>"><?php echo $secondBid; ?></span>
                <span class="btn btn-primary btn-sm btn-script-update" data-type="bid" data-data="<?php echo $thirdBid; ?>"><?php echo $thirdBid; ?></span>
              </label>
              <div class="col-sm-9">
                <input type="hidden" id="lotid" name="lotid" value="<?php echo $result['f_lots_id'] ?>"/>
                <input type="hidden" id="currentBid" value="<?php echo $result['f_current_bid'] ?>"/>
                <input type="text" id="bidamount" name="bidamount" required value="" placeholder="" class="f form-control"  />
              </div>
              <div class="col-sm-3">
                <span class="btn btn-success btn-script-update"  data-type="bid" data-data="bid">Bid</span>
              </div>
            </div>
            <div class="form-group row mt-4">
              <label class="col-12 col-form-label">Increment
                <span class="btn btn-danger btn-sm btn-script-update" data-type="increment" data-data="/~2">/2</span>
                <span class="btn btn-danger btn-sm btn-script-update" data-type="increment" data-data="/~3">/3</span>
                <span class="btn btn-danger btn-sm btn-script-update" data-type="increment" data-data="/~4">/4</span>
                <span class="btn btn-success btn-sm btn-script-update" data-type="increment" data-data="x~2">x2</span>
                <span class="btn btn-success btn-sm btn-script-update" data-type="increment" data-data="x~3">x3</span>
                <span class="btn btn-success btn-sm btn-script-update" data-type="increment" data-data="x~4">x4</span>
              </label>
              <div class="col-sm-9">
                <input type="text" id="incrementAmount" name="incrementAmount" required value="" placeholder="" class="f form-control"  />
              </div>
              <div class="col-sm-3">
                <span class="btn btn-success btn-script-update" data-type="increment" data-data="increment">Change</span>
              </div>
            </div>
            <div class="form-group row mt-4">
              <label class="col-12 col-form-label">Adjustment</label>
              <div class="col-sm-9">
                <input type="text" id="substract" name="substract" required value="" placeholder="" class="f form-control"  />
              </div>
              <div class="col-sm-3">
                <span class="btn btn-success btn-script-update" data-type="substract">Subtract</span>
              </div>
            </div>

            <div class="form-group row mt-5">
              <span class="btn btn-success btn-block btn-script-update" data-type="close">Close This Lot</span>
            </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</main>