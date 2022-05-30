<?php include "header.php"; ?>

<div class="container bg">

    <div class="mt-5">
        <?php include "navbar.php"; ?>
    </div>


    <!-- start section menu-->


    <!-- end section menu-->

    <div class="d-flex justify-content-between">
        <?php include "aside.php"; ?>
        <div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            چی تو ذهنته یه پست جدید بزار
                        </div>
                        <div class="card-body">
                            <form method="post" action="../Controller/posts.php" id="new-post-form">
                                <div class="input-group">
                                    <textarea class="form-control" aria-label="With textarea"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary" form="new-post-form">
                                <i class="fa fa-address-card"></i>
                                انتشار پست جدید

                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($posts_array as $post): ?>
                    <div class="col-12">
                        <div class="card mt-5">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-6">
                                        <img src="<?php
                                        if ($post["image"] != "") {
                                            echo $post["image"];
                                        } else {
                                            if ($post["gender"] == 0) {
                                                echo "images/users/female.png";
                                            } else {
                                                echo "images/users/male.png";
                                            }
                                        }
                                        ?>" class="img-fluid rounded-circle profile" alt="" loading="lazy">

                                    </div>
                                    <div class="col-lg-8 col-sm-6">
                                        <p><a href="#">
                                                <b>    <?php echo $post["username"]; ?></b>
                                            </a></p>
                                        <p class="text-secondary "><small><?php echo time2str($post["time"]); ?></small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <p>
                                    <?php echo $post["caption"]; ?>
                                </p>
                                <div class="text-center">
                                    <img src="<?php echo $post["media"]; ?>" loading="lazy" alt="" class="w-100">
                                </div>

                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-3">

                                        <button type="submit" class="btn btn-primary" form="new-post-form">
                                            <span><?php echo $post["likes"]["count"]; ?></span>
                                            <i class="far fa-heart"></i>
                                        </button>
                                    </div>
                                    <div class="col-9">
                                        <form id="form-comment-<?php echo $post["id_post"]; ?>">
                                            <div class="form-row align-items-center">
                                                <div class="col-auto">
                                                    <input type="text" class="form-control mb-2" name="textcomment"
                                                           id="inlineFormInput" placeholder="دیدگاه شما...">
                                                    <input type="hidden" name="id_post"
                                                           value="<?php echo $post["id_post"]; ?>">
                                                </div>
                                                <div class="col-auto">
                                                    <button type="button" class="btn btn-info mb-2"
                                                            onclick="send_comment(<?php echo $post["id_post"]; ?>)">
                                                        ارسال
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="row">
                                        <div>
                                            <p>
                                                <button class="btn btn-primary" type="button" data-toggle="collapse"
                                                        data-target="#collapse<?php echo $post["id_post"]; ?>"
                                                        aria-expanded="false" aria-controls="collapseExample">
                                                    نمایش دیدگاه کاربران
                                                </button>
                                            </p>
                                            <div class="collapse" id="collapse<?php echo $post["id_post"]; ?>">
                                                <div class="card card-body">
                                                    <ul class="list-group"
                                                        id="list-comments-<?php echo $post["id_post"]; ?>">

                                                        <?php foreach ($post["comments"] as $comment): ?>

                                                            <li href="#" class="list-group-item list-group-item-action"
                                                                aria-current="true">
                                                                <div class="d-flex w-100 justify-content-between">
                                                                    <h5 class="mb-1"><?php echo $comment["username"]; ?></h5>
                                                                    <small><?php echo time2str($comment["time"]); ?></small>
                                                                </div>
                                                                <p class="mb-1"><?php echo $comment["text"]; ?></p>
                                                            </li>

                                                        <?php endforeach; ?>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
    </div>

</div>

<script>
    async function send_comment(id_post) {
        var form = document.getElementById("form-comment-" + id_post);
        var form_data = new FormData(form);
        let x = await fetch("send_comment", {
            method: "post",
            body: form_data
        });
        let y = await x.text();
        if (y == 1) {
            let list_comments = document.getElementById("list-comments-" + id_post);
            let li = document.createElement("li");
            li.classList.add("list-group-item");
            li.classList.add("list-group-item-action");
            let div = document.createElement("DIV");
            div.classList.add("row", "d-flex", "justify-content-between");
            let h5 = document.createElement("h5");
            h5.classList.add("mb-1");
            // h5.innerHTML = form_data.get("username");

            let small = document.createElement("small");
            // small.innerHTML = form_data.get("time");

            let p = document.createElement("p");
            p.classList.add("mb-1");
            p.innerHTML = form_data.get("textcomment");

            div.appendChild(h5);
            div.appendChild(small);
            li.appendChild(p);
            li.appendChild(div);
            list_comments.appendChild(li);
        }


    }


</script>
<?php include "footer.php"; ?>
