<?php $this->title = 'Welcome!'; ?>
    <div class="index_succ">
<?php if (isset($logged_user[0]['login'])){ ?>
    <h1> Hi, <?php echo $logged_user[0]['login']; ?> </h1>
    <hr>
    You can go to your <a href="/web/index.php?r=todo/main">deals</a> page!
    <hr>
    <a href="/web/index.php?r=todo/logout">Exit</a></div>
<?php } else { ?>
    <div class="jumbotron text-center">
        <h2> Welcome to your personalize deal-manager! </h2>
        <div class="jumbotron text-center">
			<span class="index_urls">
				<hr> <hr>
				<a href="/web/index.php?r=todo/login"><h2>Autorization</h2></a><br>
				<a href="/web/index.php?r=todo/signupform"><h2>Registration</h2></a>
			</span>
        </div>
    </div>
<?php } ?>