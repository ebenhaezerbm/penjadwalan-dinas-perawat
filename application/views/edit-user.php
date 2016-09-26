			<div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line"><?php echo $title; ?></h4>

                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Edit User
                        </div>
                        <div class="panel-body">
                            <form method="POST" action="<?php echo base_url('c_User/update_user'); ?>" role="form">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama" />
                                </div>
                                <div class="form-group">
                                    <label for="nip">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" />
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                            <hr />
                            For more customization for this template or its components please visit official bootstrap website i.e <strong> getbootstrap.com </strong> or
                            <a href="http://getbootstrap.com/css/#forms" target="_blank">click here</a>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="alert alert-warning">
                        This is blank page for which you can customize for your project. 
                        Use this admin template 100% free to use for personal and commercial use which is crafted by 
                        <br />
                        <a href="http://www.designbootstrap.com/" target="_blank">DesignBootstrap.com</a> . For more free templates and snippets keep looking <a href="http://www.designbootstrap.com/" target="_blank">DesignBootstrap.com</a> . Hope you will like our work
                    </div>
                </div>

            </div>