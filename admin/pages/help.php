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
          <div class="pb-5">
            <span class="heading">Auction Console</span>
            <br> The console is where you will conduct your live auctions. Only one lot may be live at any given time. The console consists of three panels plus a list of lots for the day's auction.
            <ul>
                <li>Image Panel</li>
                Shows the primary image for the current auction. If there are additional images they will appear at the bottom of the page.
                <br>
                <br>
                <li>Auction Panel</li>
                This panel is divided into two sections, the Information section and the Messages section. In the Information area you can view the current status of the auction for the lot in progress. In the Messages area you have the ability to send messages that can be viewed by all auction participants. You should always start an auction by pressing the "Start Bidding" button in the Messages section. During the course of the auction you can send messages to the participants including a "Custom Message" that you define by typing it into the text box. If the value of a lot has reached an amount above the reserve that you are happy with you can complete the auction by clicking the message "Lot Sold". This will close the auction to all further bids and the next lot will automatically post. If the highest bid for the lot does not reach the reserve you can close the auction by clicking the "Close This Lot" button at the bottom of the Controls panel. You may also lower the reserve by clicking Edit from the Lot List at the bottom of the page.

                <br>
                <br>
                <li>Controls Panel</li>
                This panel is divided into three sections, the Bidding Area, the Increments section and the Bid Adjustment section.
                <br> - The <b>Bidding Area</b> is where you will transmit bids made by floor bidders to your online auction participants.
                <br> - The <b>Increment</b> section allows you to increase or decrease the bid increment at your discretion.
                <br> - The <b>Bid Adjustment</b> section will allow you to correct bid errors during the course of the auction should they occur. You may subtract any amount at your discretion.
                <br>
                <br> At the bottom of the Controls Panel is the "Close This Lot" button which will allow you to stop an auction for any reason. Usually you would use this button if the lot does not meet it's reserve. If the lot price has been bid at or above the reserve then you should use the "Lot Sold" button in the Messages area to close the auction for this lot.
                <br>
                <br>
                <li>Auto-Post</li>
                Once you submit your first lot, subsequent lots will auto-post in order of a "Sequence Number" that precedes the lot number. If you choose not to use a Sequence Number then lots will post in numerical order based on the Lot Number itself. Whenever you add a lot it is suggested that you prepend the lot number with a sequence number of your choosing, followed by a dash. This will give you more control over the sequence in which lots auto-post. For example 1001-XXXXXXXX, 1002-XXXXXXXX, 1003-XXXXXXXX. This allows you to change the order of the lots later of you need to. <i>You should always use the same number of digits for the sequence number for a particular auction.</i> Once a lot is Sold or Closed the next lot in the sequence will automatically post to the live auction. You may change the sequence of posting simply by clicking Edit and changing the sequence number. You may remove any lot from the live auction by clicking Edit and unchecking the Activate box.
            </ul>
            <br>
            <span class="heading">Users</span>
            <br> If you select Users from the menu you will be able to Edit user information should it become necessary. You also have the ability to Deactivate a user at your discretion.
            <br>
            <UL>
                <li style='font-weight:normal;'>Users cannot participate in an auction until they are activated.</li>
                <li style='font-weight:normal;'>If the Admin adds a user the password will not show in the user list unless the record is Edited and the Admin changes the password.</li>
            </UL>
            <br>
            <span class="heading">Export</span>
            <br> If you select Export from the menu you will be able to export User, Lot and Bid information in a CSV format. This information can then be imported into an Excel spreadsheet or most applications that support CSV imports.
            <br>
            <br>
            <span class="heading">Stream</span>
            <br> If you select Stream from the menu you will be able to cut-and-paste embed code into the box provided. This code is provided by your live streaming services provider (e.g. Ustream.com). Once the code is in place you can view a live audio or video stream by clicking the "Show Video" link at the top of the Live Bidding Console. This box will also support on-demand video embed code (e.g. YouTube.com) if you prefer.
            <br>
            <br>
            <span class="heading">Lots</span>
            <br> If you select Stream from the menu you can choose one of two pages.
            <ul>
                <li>Manage Lots</li>
                This page will allow you to Add new lots or Edit existing lots. If you check the Activate box when you Add or Edit a lot then the lot will appear in the Catalog that your users can view. When a lot is added it is suggested that you prepend the lot number with a "Sequence Number" followed by a dash. for example 1001-XXXXXXXX, 1002-XXXXXXXX, 1003-XXXXXXXX.
                <i>You should always use the same number of digits for the sequence number for a particular auction.</i>

                <li>Completed Lots</li>
                This page will show you all lots that have been Sold or Closed. You may Repost a lot so that it can be made active for an auction again. You may also view the bidding History for any completed lot.
            </ul>
            <br>
            <span class="heading">Events</span>
            <br> Events are public notices that let users know when an auction will take place. If you check the Activate box when you Add or Edit an event then the event will appear on the home page of the site so that your users can see it.
            <br>
            <br>
            <span class="heading">Password</span>
            <br> Selecting this menu item will allow you to change your admin Password.
            <br>
            <br>
            <span class="heading">Pages</span>
            <br> This will allow you to create an "About Us", "Contact Us" and "Terms and Conditions" page that will be visible to your users. You can use plain text or HTML as you prefer.
            <br>
            <br>
            <span class="heading">Graphics</span>
            <br> This page will allow you to change the way your site looks. You can upload your logo and images using the sections provided. You can also change the page background color and the background color on either side of your logo. Also provided is a way to enter your Twitter and Facebook URLs.
            <br>
            <br>
            <span class="heading">Help</span>
            <br> This page! For further assistance please contact your software provider.
          </div>  
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>