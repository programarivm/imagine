import { config } from './config.js';
import { toQueryParams } from './api/helpers.js';

const button = document.querySelector('form#login button');

button.onclick = () => {
  const params = {
    client_id: config.clientID,
    redirect_uri: config.redirectURL,
    scopes: config.scopes,
    response_type: "code",
    response_mode: "form_post",
    state: crypto.getRandomValues(new Uint8Array(4)).join(""),
    nonce: crypto.getRandomValues(new Uint8Array(4)).join(""),
  };
  window.location.href = `${config.issuerURL}/auth?${toQueryParams(params)}`;

  return false;
};
