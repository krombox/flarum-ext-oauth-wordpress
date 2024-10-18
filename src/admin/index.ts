import app from 'flarum/admin/app';
import { ConfigureWithOAuthPage } from '@fof-oauth';

app.initializers.add('krombox/oauth-wordpress', () => {
  app.extensionData.for('krombox-oauth-wordpress').registerPage(ConfigureWithOAuthPage);
});