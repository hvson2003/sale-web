<?=template_header('Information')?>

<div class="container rounded bg-white mt-5 mb-5">
    <div class="row  form_profie">
        <div class="col-md-5 border-right">
            <form action="index.php?controller=user&action=update_profile" method="post" class="form_edit">
                <input type="text" class="form-control" name="id" value="<?= $user['id'] ?>" hidden>
                <div class="p-1 py-3 box_profi">
                    <div class="d-flex flex-column align-items-center text-center p-2 py-4">
                        <div class="border-animation">
                            <img class="rounded-circle" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Username</label><input type="text" class="form-control" name="username" value="<?= $user['username'] ?>"></div>
                        <div class="col-md-6"><label class="labels">Fullname</label><input type="text" class="form-control" name="fullname" value="<?= $user['fullname'] ?>"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Password</label><input type="password" class="form-control" name="password" value="<?= $user['password'] ?>"></div>
                        <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" name="email" value="<?= $user['email'] ?>"></div>
                        <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" name="address" value="<?= $user['address'] ?>"></div>
                        <div class="col-md-12"><label class="labels">Phone</label><input type="text" class="form-control" name="phone" value="<?= $user['phone'] ?>"></div>
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                </div>
            </form>
        </div>
    </div>
</div>


<?=template_footer()?>