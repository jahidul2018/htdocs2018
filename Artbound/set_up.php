<?php

	$connect= mysql_connect("localhost","root","") or die("Could not connect to database");
	
	$query= "Drop database if exists artbound";
	$result= mysql_query($query,$connect);
	
	if(!$result){
		echo "ERROR:".mysql_error();
	}
	else{
		echo "Database Dropped<br>";
	}
	$connect= mysql_connect("localhost","root","");
	
	$query= "create database artbound";
	$result= mysql_query($query,$connect);
	
	if(!$result){
		echo "ERROR:".mysql_error();
	}
	else{
		echo "Database Created<br>";
	}
	
	mysql_select_db("artbound");
	
	
	
	$query = "CREATE TABLE `users`(
		  `UserID` int(11) NOT NULL AUTO_INCREMENT,
		  `FirstName` varchar(50) DEFAULT NULL,
		  `LastName` varchar(50) DEFAULT NULL,
		  `UserName` varchar(50) DEFAULT NULL,
		  `Email` varchar(50) DEFAULT NULL,
		  `Active` int(1) DEFAULT NULL,
		  `ActivationCode` varchar(32) DEFAULT NULL,
		  `Password` varchar(50) DEFAULT NULL,
		  `UserType` varchar(10) DEFAULT NULL,
		  `BirthDay` varchar(3) DEFAULT NULL,
		  `BirthMonth` varchar(10) DEFAULT NULL,
		  `BirthYear` varchar(4) DEFAULT NULL,
		  `Gender` varchar(6) DEFAULT NULL,
		  `ContactNumber` varchar(20) DEFAULT NULL,
		  `ActivityClearance` varchar(10) NOT NULL,
		  `attempts` int(3) DEFAULT NULL,
		  `timestamp` int(3) DEFAULT NULL,
		  `LoginNumbers` int(10) NOT NULL,
		  `ProfileImage` varchar(100) NOT NULL,
		  `AboutMe` varchar(3000) NOT NULL,
		  PRIMARY KEY (`UserID`)
	)";

	$result= mysql_query($query,$connect);
	
	if(!$result){
		echo "ERROR:".mysql_error();
	}
	else{
		echo "users Table Created<br>";
	}
	
	$query= "INSERT INTO users(FirstName, LastName, UserName, Email, Active, ActivationCode, Password, UserType, BirthDay, BirthMonth, BirthYear, Gender, ContactNumber, ActivityClearance, attempts, timestamp, LoginNumbers) values ('Admin','Admin', 'Admin', 'artbound.xplorer@gmail.com', 1, '123236dcd137fd08c1cc9d86f016ca34', 'Aa!123456', 'admin', '1', '1', '1990', 'male', '0171xxxxxxx', 'Active', 0, 0, 0)";
	$result= mysql_query($query, $connect);
	
	if(!$result){
		echo "ERROR:".mysql_error();
	}
	else{
		echo "Users data inserted<br>";
	}
	
	
	
	$query = "CREATE TABLE `credit_card`(
			  `CreditID` int(11) NOT NULL AUTO_INCREMENT,
			  `UserID` int(11) DEFAULT NULL,
			  `NationalID` varchar(17) DEFAULT NULL,
			  `NameOnCard` varchar(50) DEFAULT NULL,
			  `CardType` varchar(20) DEFAULT NULL,
			  `CardNumber` varchar(20) DEFAULT NULL,
			  `ExpireMonth` varchar(10) DEFAULT NULL,
			  `ExpireYear` varchar(4) DEFAULT NULL,
			  `CVV` varchar(5) DEFAULT NULL,
			  `Email` varchar(50) DEFAULT NULL,
			  `FirstName` varchar(50) DEFAULT NULL,
			  `LastName` varchar(50) DEFAULT NULL,
			  `CompanyName` varchar(60) DEFAULT NULL,
			  `ContactNumber` varchar(15) DEFAULT NULL,
			  `AddressLine1` varchar(50) DEFAULT NULL,
			  `AddressLine2` varchar(50) DEFAULT NULL,
			  `City` varchar(30) DEFAULT NULL,
			  `ZipCode` varchar(10) DEFAULT NULL,
			  PRIMARY KEY (`CreditID`)
	)";
	
	$result= mysql_query($query,$connect);
	
	if(!$result){
		echo "ERROR:".mysql_error();
	}
	else{
		echo "credit_card Table Created<br>";
	}
	
	
	
	$query = "CREATE TABLE `art`(
			  `ArtID` int(11) NOT NULL AUTO_INCREMENT,
			  `UserID` int(11) DEFAULT NULL,
			  `ArtImage` varchar(100) DEFAULT NULL,
			  `ArtName` varchar(100) DEFAULT NULL,
			  `Style` varchar(10) DEFAULT NULL,
			  `Subject` varchar(11) DEFAULT NULL,
			  `Medium` varchar(12) DEFAULT NULL,
			  `CreateDay` varchar(2) DEFAULT NULL,
			  `CreateMonth` varchar(2) DEFAULT NULL,
			  `CreateYear` varchar(4) DEFAULT NULL,
			  `BackgroundStory` varchar(3000) DEFAULT NULL,
			  `SaleStatus` varchar(8) DEFAULT NULL,
			  `PurchasedBy` varchar(60) DEFAULT NULL,
			  `UploadDay` varchar(2) DEFAULT NULL,
			  `UploadMonth` varchar(2) DEFAULT NULL,
			  `UploadYear` varchar(4) DEFAULT NULL,
			  `UploadTime` varchar(11) DEFAULT NULL,
			  `AdminClearance` varchar(12) DEFAULT NULL,
			  `AuctionRequest` int(5) DEFAULT NULL,
			  `RequestStatus` varchar(10) DEFAULT NULL,
			  `Report` int(5) DEFAULT NULL,
			  `Likes` varchar(10) NOT NULL,
			  PRIMARY KEY (`ArtID`)
			)";
	
	$result= mysql_query($query,$connect);
	
	if(!$result){
		echo "ERROR:".mysql_error();
	}
	else{
		echo "art Table Created<br>";
	}
	
	
	
	$query = "CREATE TABLE `likes`(
			  `LikeID` int(11) NOT NULL AUTO_INCREMENT,
			  `UserID` varchar(11) DEFAULT NULL,
			  `ArtID` varchar(11) DEFAULT NULL,
			  `LikeDate` varchar(11) DEFAULT NULL,
			  `LikeTime` varchar(10) DEFAULT NULL,
			  PRIMARY KEY (`LikeID`)
			)";
	
	$result= mysql_query($query,$connect);
	
	if(!$result){
		echo "ERROR:".mysql_error();
	}
	else{
		echo "likes Table Created<br>";
	}
	
	
	
	$query = "CREATE TABLE `reports`(
			  `ReportID` int(11) NOT NULL AUTO_INCREMENT,
			  `UserID` varchar(11) DEFAULT NULL,
			  `ArtID` varchar(11) DEFAULT NULL,
			  `ReportDetail` varchar(2000) DEFAULT NULL,
			  `ReportDate` varchar(11) DEFAULT NULL,
			  `ReportTime` varchar(10) DEFAULT NULL,
			  `ReportChecked` varchar(15) DEFAULT NULL,
			  PRIMARY KEY (`ReportID`)
			)";
	
	$result= mysql_query($query,$connect);
	
	if(!$result){
		echo "ERROR:".mysql_error();
	}
	else{
		echo "reports Table Created<br>";
	}
	
	
	
	$query = "CREATE TABLE `auction_request`(
			  `RequestID` int(11) NOT NULL AUTO_INCREMENT,
			  `UserID` varchar(11) DEFAULT NULL,
			  `ArtID` varchar(11) DEFAULT NULL,
			  `RequestDate` varchar(11) DEFAULT NULL,
			  `RequestTime` varchar(10) DEFAULT NULL,
			  PRIMARY KEY (`RequestID`)
			)";
	
	$result= mysql_query($query,$connect);
	
	if(!$result){
		echo "ERROR:".mysql_error();
	}
	else{
		echo "auction_request Table Created<br>";
	}
	
	
	
	$query = "CREATE TABLE `auction`(
			  `AuctionID` int(11) NOT NULL AUTO_INCREMENT,
			  `ArtID` int(11) DEFAULT NULL,
			  `UserID` int(11) DEFAULT NULL,
			  `StartDate` varchar(20) DEFAULT NULL,
			  `ClosingDate` varchar(20) DEFAULT NULL,
			  `InitialPrice` varchar(8) DEFAULT NULL,
			  `IncrementPerBid` varchar(8) DEFAULT NULL,
			  PRIMARY KEY (`AuctionID`)
			)";
	
	$result= mysql_query($query,$connect);
	
	if(!$result){
		echo "ERROR:".mysql_error();
	}
	else{
		echo "auction Table Created<br>";
	}
	
	

	$query = "CREATE TABLE `bid`(
			  `BidID` int(11) NOT NULL AUTO_INCREMENT,
			  `ArtID` int(11) DEFAULT NULL,
			  `UserID` int(11) DEFAULT NULL,
			  `UserName` varchar(50) DEFAULT NULL,
			  `BidDate` varchar(15) DEFAULT NULL,
			  `BidTime` varchar(15) DEFAULT NULL,
			  `BidAmount` int(15) DEFAULT NULL,
			  PRIMARY KEY (`BidID`)
			)";
	
	$result= mysql_query($query,$connect);
	
	if(!$result){
		echo "ERROR:".mysql_error();
	}
	else{
		echo "bid Table Created<br>";
	}
	
	
	
	$query = "CREATE TABLE `auction_winner`(
			  `WinID` int(11) NOT NULL AUTO_INCREMENT,
			  `AuctionID` varchar(11) NOT NULL,
			  `WinnerID` varchar(11) DEFAULT NULL,
			  `ArtistID` varchar(11) DEFAULT NULL,
			  `ArtID` varchar(11) DEFAULT NULL,
			  `BillingAddress` varchar(100) DEFAULT NULL,
			  `ShippingAddress` varchar(100) DEFAULT NULL,
			  `ConfirmationDate` varchar(15) DEFAULT NULL,
			  `ReceivingDate` varchar(15) DEFAULT NULL,
			  `AmountToBePaid` varchar(15) DEFAULT NULL,
			  `PaymentStatus` varchar(20) DEFAULT NULL,
			  PRIMARY KEY (`WinID`)
			)";
	
	$result= mysql_query($query,$connect);
	
	if(!$result){
		echo "ERROR:".mysql_error();
	}
	else{
		echo "auction_winner Table Created<br>";
	}
	
	
	
	$query = "CREATE TABLE `user_guide`(
			  `ID` varchar(5) NOT NULL,
			  `ArtistGuide` mediumtext,
			  `CollectorGuide` mediumtext,
			  `BidderGuide` mediumtext,
			  `MemberGuide` mediumtext,
			  `FAQ` mediumtext,
			  `ArtboundAim` mediumtext,
			  `ArtboundEvolution` mediumtext,
			  `ContactNumber` varchar(15) DEFAULT NULL,
			  `ContactEmail` varchar(50) DEFAULT NULL,
			  `ContactAddress` varchar(200) DEFAULT NULL,
			  `TermService` mediumtext,
			  `PrivacyPolicy` mediumtext,
			  `CopyrightPolicy` mediumtext,
			  `About` mediumtext,
			  PRIMARY KEY (`ID`)
			)";
	
	$result= mysql_query($query,$connect);
	
	if(!$result){
		echo "ERROR:".mysql_error();
	}
	else{
		echo "user_guide Table Created<br>";
	}
	
	
	$query= "INSERT INTO user_guide(ID, ArtistGuide, CollectorGuide, BidderGuide, MemberGuide, FAQ, ArtboundAim, ArtboundEvolution, ContactNumber, ContactEmail, ContactAddress, TermService, PrivacyPolicy, CopyrightPolicy, About) values ('admin', 'Artists are allowed to edit their profile info, visit other artists and collectors profile, upload arts, give like to artworks, report arts, send auction request for other artists or collectors artworks, bid in auction if their credit card details is complete. Artbound will cut 5 percent commission of each art sale. But no commission will be cut for the first 2 art sale of an artist. Any user who will send request for auction of an artwork is bound to allow Artbound cut 1000 BDT from their credit account as deposit for the auction.', 'Collectors are allowed to edit their profile info, visit other artists and collectors profile, upload arts, give like to artworks, report arts, send auction request for other artists or collectors artworks, bid in auction if their credit card details is complete. Artbound will cut 5 percent commission of each art sale. But no commission will be cut for the first 2 art sale of a collector. Any user who will send request for auction of an artwork is bound to allow Artbound cut 1000 BDT from their credit account as deposit for the auction when the auction starts.', 'Bidders are allowed to edit their profile info, visit artists and collectors profile, give like to artworks, report arts, send auction request for artworks, bid in auction if their credit card details is complete. Any user who will send request for auction of an artwork is bound to allow Artbound cut 1000 BDT from their credit account as deposit for the auction.', 'Members are allowed to edit their profile info, visit artists and collectors profile, give like to artworks, report arts etc. They are not allowed to send auction request for artworks or bid in auction. However, they can always visit an ongoing auction.', 'What Is Artbound?

           Artbound is an online art gallery, established with the goal of helping people all over the world connect with art and artists of Bangladesh. We offer an unparalleled selection of paintings, drawings etc. and provide artists of Bangladesh with an expertly curated environment in which to exhibit and sell their work. Artbound is redefining the experience of buying and selling art, making it welcoming and accessible for artists and collectors alike.



What Are Some Ways To Discover New Art On Artbound?

              Users can check the Recently Arrived section of the menu bar where links are given to pages where new arts are available.



How Long Will It Take To Receive My Order?

             See below for standard delivery times according to artwork type, as well as some common reasons for delivery delays.

             Originals and Limited Edition Prints:

                       Original artworks and limited edition prints usually arrive within eleven (11) to fourteen (14) business days from time of order, depending on the 
             origin and destination of the artwork as well as the time it takes to clear customs if the work is shipped internationally. From time of shipping, the artwork 
             will usually arrive at the buyers destination between seven (7) to ten (10) business days, barring any delays due to customs clearance.

             Unframed Prints 

                    Unframed prints are shipped from the Bangladesh within three (3) to five (5) business days of placing the order. If you reside within the Bangladesh, you 
              can expect your print to arrive within seven (7) to ten (10) business days from time of shipping. Shipping time will vary for buyers outside of the Bangladesh, 
              as delivery speed depends on the customs requirements of the country of destination.
 
             Common Reasons for Delivery Delays

                   If you live in an area experiencing severe weather, natural disasters, or any other unforeseen major events, your package may be delayed. Please add an 
             additional 2 - 3 business days to the estimated delivery date of your order. Also, in some countries, the customs clearing process may take as long as 30 days. 
             Please check your governments international shipping policies for more detailed information.', 'It is our mission to make it easy for you to discover and collect fine art from renowned artists, galleries, and cultural institutions of Bangladesh.', 'This is Artbound Evolution', 'Not Added Yet', 'artbound.xplorer@gmail.com', 'Not Added Yet', 'Artbound provides a service for selling and purchasing original works of art and commercially exploiting digital images of works of art (the Service, collectively the Services) through this website. Please read carefully the following terms and conditions (Terms) and our Privacy Policy, which may be found at artbound/privacy.php privacy and which is incorporated by reference into these Terms. These Terms govern your access to and use of the Site and Services, and constitute a binding legal agreement between you and Artbound.

Certain areas of the Site and your access to certain Services may have different terms and conditions posted or may require you to agree with and accept additional terms and conditions. If there is a conflict between these Terms and the terms and conditions posted for a specific area of the Site or for specific Services, the latter terms and conditions shall take precedence with respect to your use of or access to that area of the Site or Services.

YOU ACKNOWLEDGE AND AGREE THAT, BY ACCESSING OR USING THE SITE OR SERVICES OR BY SELLING OR PURCHASING A WORK ON OR THROUGH THE SITE OR SERVICES OR BY POSTING ANY CONTENT ON THE SITE, YOU ARE INDICATING THAT YOU HAVE READ, UNDERSTAND AND AGREE TO BE BOUND BY THESE TERMS. IF YOU DO NOT AGREE TO THESE TERMS, THEN YOU HAVE NO RIGHT TO ACCESS OR USE THE SITE OR SERVICES. If you accept or agree to these Terms on behalf of a company or other legal entity, you represent and warrant that you have the authority to bind that company or other legal entity to these Terms and, in such event, you and your will refer and apply to that company or other legal entity.', 'Information You Directly and Voluntarily Provide to Us. We may collect and store some or all of the following information you make available to us:

If you download, register for or use the Service, we may ask you to provide your name, mailing address, email address, telephone number, image, interests, demographic profile, credit card information, user name, password and other registration information. You may be required to register with us and provide us with the information we request from you in order to use the Service or to use some or all of the features offered by the Service. We may also offer you the option to complete a user profile that may be visible to other users of the Service. If a user profile feature is offered through the Service, you may be able to adjust the settings in your user account to specify the information in your user profile that will be shared publicly, that will only be shared with your friends, or that will remain private. If you are a registered user you may also be able to adjust your account settings through your user account. We note that, even if you adjust your settings so that your user profile is only shared with your friends or remains private, we will still be able to access and view the information you provide as part of your user profile.
Information you provide when you contact us for technical or customer support or with questions about your use of the Service.

Information Automatically Collected from You. In addition to the information you provide to us, the Service may collect and store additional information automatically, this information may include information about how often you use the Service (for example, how many times you logged into the system).', 'Artbound respects the intellectual property rights of others and expects its users to do the same.

It is Artbounds policy, in appropriate circumstances and at its discretion, to disable and/or terminate the accounts of users who repeatedly infringe or are repeatedly charged with infringing the copyrights or other intellectual property rights of others.

In accordance with the Digital Millennium Copyright Act of 1998, the text of which may be found on the Bangladesh Copyright Office website, Artbound will respond expeditiously to claims of copyright infringement committed using the Artbound website that are reported to Artbounds Designated Copyright Agent, identified in the sample notice below.

If you are a copyright owner, or are authorized to act on behalf of one, or authorized to act under any exclusive right under copyright, please report alleged copyright infringements taking place on or through the Site by completing the following DMCA Notice of Alleged Infringement and delivering it to Artbounds Designated Copyright Agent. Upon receipt of the notice as described below, Artbound will take whatever action, in its sole discretion, it deems appropriate, including removal of the challenged material from the Site.', 'It is our mission to make it easy for you to discover and collect fine art from renowned artists, art collectors of Bangladesh.


Artbound is not just about economical value, but also about drawing attention of people in this country on Art. The socio and economic condition and practices in our country doesnâ€™t encourage people getting involved in Art related areas these days. Though as a nation we are traditionally bound with Art; our history, tradition, culture, lifestyle, festivals everything has touch of Art and had some legendary artists like Shilpacharya Zainul Abedin, SM Sultan, Quamrul Hassan, Shahabuddin Ahmed etc. from the beginning of our country. But since the world becoming faster everyday and economy is overgrowing, peopleâ€™s mentality is also changing with it. They are looking forward to quick success and earning handsome salary. Most families do not inspire children to study on Art. Rather discourage their child to be an artist. Because, they do not want their children to risk their future studying art.
Yet there are some people who walk against the tide, who love Art and want to stick with it. And this website is just a little effort to help them not to give up. It will allow the Artists and Collectors to create account, open their profile and upload their Art Works. It will also enable putting their Art Works for Auction so that they can be financially benefited. It will also be a place where people will be able to know about many artists and about their creations.
')";
	$result= mysql_query($query, $connect);
	
	if(!$result){
		echo "ERROR:".mysql_error();
	}
	else{
		echo "Users' Guide data inserted<br>";
	}

?>








