<h1>Last posts</h1>

<?php foreach($params['posts'] as $post): ?>
    <div class="card"">
        <div class="card-body">
            <h5 class="card-title"><?=$post->title?></h5>
            <p class="card-text">
                <?=$post->content?>
            </p>
            <a href="posts/<?= $post->id?>" class="btn btn-outline-primary">Read more</a>
        </div>
    </div>
<?php endforeach ?> 