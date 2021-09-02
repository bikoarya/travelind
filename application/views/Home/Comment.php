<?php
foreach ($comment as $value) :
    $id = $value['id_comment'];
    $user = $this->session->userdata('id_user');
    $where = [
        'id_comment' => $id,
        'id_user' => $user
    ];
    $where2 = [
        'id_comment' => $id,
        'type' => 1
    ];
    $like = $this->db->get_where('t_like',  $where)->row_array();
    $likes = $this->db->get_where('t_like',  $where2)->num_rows();
?>
    <h6 class="comment-name font-weight-bold mb-1 mt-3"><?= $value['fullname'] ?><span class="dates"><i class="fas fa-circle dates"></i></span><span class="comment-date"><?= date('d M Y'); ?></span></h6>
    <h6 class="comment-value mb-0"><?= $value['comment'] ?></h6>
    <span class="likes" data-id_comment="<?= $value['id_comment'] ?>"><?= $likes ?></span>
    <a href="javascript:void(0);" class="like mt-0" data-id_comment="<?= $value['id_comment'] ?>" data-like="<?= $like['type'] == 1 ? 1 : 0 ?>" style="color: <?= $like['type'] == 1 ? '#1771E6' : '#000000' ?>;">Like</a>
    <span class="space"><i class="fas fa-circle between"></i></span>
    <a href="javascript:void(0);" class="reply" data-id_comment="<?= $value['id_comment'] ?>">Reply</a>
    <div class="form-group ml-4 mt-2">
        <div class="form-group row" style="display: none;">
            <input type="text" class="col form-input w-100 border-0 replyComment ml-2" name="replyComment" data-reply-input="<?= $id ?>" placeholder="Reply comment" autocomplete="off">
            <button class="col-auto btn-reply mr-3 ml-2" data-reply-btn="<?= $id ?>">Reply</button>
        </div>
        <?php
        foreach ($reply as $value) :
            if ($value['parent'] == $id) {
                $where = [
                    'id_comment' => $value['id_comment'],
                    'id_user' => $user
                ];
                $where2 = [
                    'id_comment' => $value['id_comment'],
                    'type' => 1
                ];
                $like_child = $this->db->get_where('t_like',  $where)->row_array();
                $likes_child = $this->db->get_where('t_like',  $where2)->num_rows();
        ?>
                <h6 class="comment-name font-weight-bold mb-1 mt-3"><?= $value['fullname'] ?><span class="dates"><i class="fas fa-circle dates"></i></span><span class="comment-date"><?= date('d M Y'); ?></span></h6>
                <h6 class="comment-value mb-0"><?= $value['comment'] ?></h6>
        <?php }
        endforeach; ?>
    </div>
<?php endforeach; ?>