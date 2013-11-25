<ul>
<?
foreach($code_bits_output as $code_bit_category){
    ?>
    <li id="<?=$code_bit_category["CodeBitCategory"]["id"]?>">
        <ins>&nbsp;</ins>
        <a href="#">
            <span>&raquo;</span>
            <?=$code_bit_category["CodeBitCategory"]["name"]?>
            </a>
        <ul>
        <?
        foreach($code_bit_category["CodeBit"] as $code_bits){
            ?>
            <li id="<?=$code_bits["id"]?>">
                <a href="#"><?=$code_bits["name"]?></a>
            </li>
            <?
        }
        
        ?>
        </ul>
    </li>
    <?
}
?>
</ul>