<label for="select-type_repas">Type de repas *</label>
<select id="select-type_repas" name="select-type_repas" required>
    <?php
        foreach ($types as $type) {
    ?>
        <option value="<?=$type->id_type ?>">
             <?= $type->type_repas ?> (<?= $type->id_type ?>)
        </option>
    <?php
        }
    ?>
</select>
