            <div class="row">
                <div class="col-md-6">
                    <form action="<?php echo base_url('Login/validate_user'); ?>" method="POST">
                        <h4> Login with facebook <strong> / </strong>Google :</h4>
                        <br />
                        <a href="index.html" class="btn btn-social btn-facebook">
                        	<i class="fa fa-facebook"></i>
                        	&nbsp; Facebook Account
                    	</a>
                        &nbsp;OR&nbsp;
                        <a href="index.html" class="btn btn-social btn-google">
                        	<i class="fa fa-google-plus"></i>
                        	&nbsp; Google Account
                    	</a>
                        <hr />
							<h4> Or Login with <strong>Zontal Account  :</strong></h4>
                        <br />
                        <?php
if ($message) {
    echo '<div class="alert alert-' . $type . ' text-center">' . $message . '</div>';
    echo '<hr />';
}
?>
	                    <label>Enter Username : </label>
                        <input type="text" class="form-control" name="username" id="username" />
                        <label>Enter Password :  </label>
                        <input type="password" class="form-control" name="password" id="password" />
                        <hr />
                        <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-user"></span> &nbsp;Login</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="alert alert-info">
                        This is a free bootstrap admin template with basic pages you need to craft your project.
                        Use this template for free to use for personal and commercial use.
                        <br />
                         <strong> Some of its features are given below :</strong>
                        <ul>
                            <li>
                                Responsive Design Framework Used
                            </li>
                            <li>
                                Easy to use and customize
                            </li>
                            <li>
                                Font awesome icons included
                            </li>
                            <li>
                                Clean and light code used.
                            </li>
                        </ul>

                    </div>
                    <div class="alert alert-success">
                         <strong> Instructions To Use:</strong>
                        <ul>
                            <li>
                               Lorem ipsum dolor sit amet ipsum dolor sit ame
                            </li>
                            <li>
                                 Aamet ipsum dolor sit ame
                            </li>
                            <li>
                               Lorem ipsum dolor sit amet ipsum dolor
                            </li>
                            <li>
                                 Cpsum dolor sit ame
                            </li>
                        </ul>

                    </div>
                </div>

            </div>