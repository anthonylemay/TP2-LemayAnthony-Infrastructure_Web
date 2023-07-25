<label for="type_repas">Type de repas *</label>
<select id="dialogue-formulaire-edition-type_repas" name="type_repas" required>
    <?php
        foreach ($types as $type) {
    ?>
        <option value="<?=$type->type_repas ?>">
             <?= $type->type_repas ?> (<?= $type->id_type ?>)
        </option>
    <?php
        }
    ?>
</select>
