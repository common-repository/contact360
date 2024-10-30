<div class="wrap">
    <h1>Ustawienia Contact360</h1>

    <form method="post" action="options.php" novalidate="novalidate">
        <?php settings_fields('contact360-settings'); ?>

        <table class="form-table">
            <tbody>

            <tr>
                <th scope="row"><label for="client-id">Client ID</label></th>
                <td><input name="contact360-client-id" type="text" id="client-id"
                           aria-describedby="api-key" value="<?php echo get_option('contact360-client-id') ?>"
                           class="regular-text">
                </td>
            </tr>

            <tr>
                <th scope="row"><label for="api-secret">API secret</label></th>
                <td><input name="contact360-api-secret" type="text" id="api-secret"
                           aria-describedby="api-secret" value="<?php echo get_option('contact360-api-secret') ?>"
                           class="regular-text">
                    <p class="description" id="tagline-api-secret">Sekretny ciąg znaków wymagany do komunikacji z panelem Contact360</p>
                </td>
            </tr>

            <tr>
                <th scope="row"><label for="endpoint-url">API URL</label></th>
                <td><input name="contact360-endpoint-url" type="text" id="endpoint-url"
                           aria-describedby="endpoint-url" value="<?php echo get_option('contact360-endpoint-url') ?>"
                           placeholder="<?php echo \Contact360\API::PANEL_URL; ?>"
                           class="regular-text">
                </td>
            </tr>

            </tbody>
        </table>
        <p class="submit">
            <input type="submit" name="submit" id="submit" class="button button-primary" value="Zapisz zmiany">
        </p>
    </form>
</div>