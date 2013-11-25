<?
foreach($output as $project){
    ?>
    <div class="project_items" id="<?=$project["Project"]["project_hash_key"]?>">
        <div class="arrow"></div>
        <div class="name"> "<?=$project["Project"]["project_name"]?>" </div>
    </div>
    <?
}


?>