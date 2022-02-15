<script>
            function valideKey(evt) {
                var code = evt.which ? evt.which : evt.keyCode;
                if (code == 8) {
                    //backspace
                    return true;
                } else if (code >= 48 && code <= 57) {
                    return true;
                } else {
                    return false;
                }
            }

  </script>
    <style type="text/css">
h1,
h2,
h3,
h4,
h5 {
  margin: 0;
  font-weight: 600; }

.button {
  color: #ffffff;
  background-color: #24cf5f;
  padding: 12px 25px;
  font-size: 12px;
  letter-spacing: 1px;
  text-transform: uppercase;
  border: 0;
  border-radius: 2px;
  outline: 0;
  box-shadow: 3px 3px 20px rgba(0, 0, 0, 0.2);
  transition: all .2s; }
  .button:hover, .button:active, .button:focus {
    -ms-transform: scale(1.1);
        transform: scale(1.1); }

.button--transparent {
  background: transparent;
  border: 0;
  outline: 0; }

.button--close {
  position: absolute;
  top: 10px;
  left: 10px;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
      align-items: center;
  -ms-flex-pack: center;
      justify-content: center;
  width: 30px;
  height: 30px;
  color: #ffffff;
  border-radius: 50%;
  transition: all .25s;
  z-index: 10; }
  .button--close svg {
    width: 20px;
    height: 20px; }
    .button--close svg * {
      fill: currentColor; }
  .button--close:hover, .button--close:active, .button--close:focus {
    color: #fbcf34;
    background-color: #ffffff;
    box-shadow: 3px 3px 20px rgba(0, 0, 0, 0.1); }

.button--info {
  position: absolute;
  top: 0;
  right: 0; }

input {
  width: calc(100% - 10px);
  min-height: 30px;
  padding-left: 5px;
  padding-right: 5px;
  letter-spacing: .5px;
  border: 0;
  border-bottom: 2px solid #f0f0f0; }
  input:valid {
    border-color: #24cf5f; }
  input:focus {
    outline: none;
    border-color: #fbcf34; }

.form-list {
  padding-left: 0;
  list-style: none; }
  .form-list__row {
    margin-bottom: 25px; }
    .form-list__row label {
      position: relative;
      display: block;
      text-transform: uppercase;
      font-weight: 600;
      font-size: 11px;
      letter-spacing: .5px;
      color: #939393; }
    .form-list__row--inline {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-pack: justify;
          justify-content: space-between; }
      .form-list__row--inline > :first-child {
        -ms-flex: 2;
            flex: 2;
        padding-right: 20px; }
      .form-list__row--inline > :nth-child(2n) {
        -ms-flex: 1;
            flex: 1; }
  .form-list__input-inline {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: justify;
        justify-content: space-between; }
    .form-list__input-inline > * {
      width: calc(50% - 10px - 10px); }
  .form-list__row--agree {
    margin-top: 30px;
    margin-bottom: 30px;
    font-size: 12px; }
    .form-list__row--agree label {
      font-weight: 400;
      text-transform: none;
      color: #676767; }
    .form-list__row--agree input {
      width: auto;
      margin-right: 5px; }

#input--cc {
  position: relative;
  padding-top: 6px; }
  #input--cc input {
    padding-left: 46px;
    width: calc(100% - 46px); }
  #input--cc:before {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    width: 36px;
    height: 45px;
    background-image: url("data:image/svg+xml;utf8,%3Csvg%20class%3D%22nc-icon%20glyph%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20xmlns%3Axlink%3D%22http%3A//www.w3.org/1999/xlink%22%20x%3D%220px%22%20y%3D%220px%22%20width%3D%2248px%22%20height%3D%2248px%22%20viewBox%3D%220%200%2048%2048%22%3E%3Cg%3E%20%3Cpath%20data-color%3D%22color-2%22%20fill%3D%22%238c8c8c%22%20d%3D%22M47%2C16V9c0-1.105-0.895-2-2-2H3C1.895%2C7%2C1%2C7.895%2C1%2C9v7H47z%22%3E%3C/path%3E%20%3Cpath%20fill%3D%22%238c8c8c%22%20d%3D%22M1%2C22v17c0%2C1.105%2C0.895%2C2%2C2%2C2h42c1.105%2C0%2C2-0.895%2C2-2V22H1z%20M18%2C33H8c-0.552%2C0-1-0.448-1-1s0.448-1%2C1-1h10%20c0.552%2C0%2C1%2C0.448%2C1%2C1S18.552%2C33%2C18%2C33z%20M40%2C33h-5c-0.552%2C0-1-0.448-1-1s0.448-1%2C1-1h5c0.552%2C0%2C1%2C0.448%2C1%2C1S40.552%2C33%2C40%2C33z%22%3E%3C/path%3E%20%3C/g%3E%3C/svg%3E");
    background-position: center;
    background-repeat: no-repeat;
    background-size: 36px;
    -ms-transform: translateY(-50%);
        transform: translateY(-50%); }

#input--cc.creditcard-icon--visa:before {
  background-image: url("data:image/svg+xml;utf8,%3Csvg%20class%3D%22nc-icon%20colored%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20xmlns%3Axlink%3D%22http%3A//www.w3.org/1999/xlink%22%20x%3D%220px%22%20y%3D%220px%22%20width%3D%2248px%22%20height%3D%2248px%22%20viewBox%3D%220%200%2048%2048%22%3E%3Cg%3E%3Crect%20x%3D%221%22%20y%3D%2214%22%20fill%3D%22%23E6E6E6%22%20width%3D%2246%22%20height%3D%2219%22%3E%3C/rect%3E%20%3Cpath%20fill%3D%22%23E79800%22%20d%3D%22M4%2C41h40c1.657%2C0%2C3-1.343%2C3-3v-5H1v5C1%2C39.657%2C2.343%2C41%2C4%2C41z%22%3E%3C/path%3E%20%3Cpath%20fill%3D%22%231A1876%22%20d%3D%22M44%2C7H4c-1.657%2C0-3%2C1.343-3%2C3v5h46v-5C47%2C8.343%2C45.657%2C7%2C44%2C7z%22%3E%3C/path%3E%20%3Cpolygon%20fill%3D%22%231A1876%22%20points%3D%2219.238%2C28.8%2021.847%2C28.8%2023.48%2C19.224%2020.87%2C19.224%20%22%3E%3C/polygon%3E%20%3Cpath%20fill%3D%22%231A1876%22%20d%3D%22M28.743%2C23.069c-0.912-0.443-1.471-0.739-1.465-1.187c0-0.398%2C0.473-0.824%2C1.495-0.824%20c0.836-0.013%2C1.51%2C0.157%2C2.188%2C0.477l0.354-2.076c-0.517-0.194-1.327-0.402-2.339-0.402c-2.579%2C0-4.396%2C1.299-4.411%2C3.16%20c-0.015%2C1.376%2C1.297%2C2.144%2C2.287%2C2.602c1.016%2C0.469%2C1.358%2C0.769%2C1.353%2C1.188c-0.006%2C0.642-0.811%2C0.935-1.562%2C0.935%20c-1.158%2C0-1.742-0.179-2.793-0.655l-0.366%2C2.144c0.61%2C0.267%2C1.737%2C0.499%2C2.908%2C0.511c2.744%2C0%2C4.525-1.284%2C4.545-3.272%20C30.944%2C24.581%2C30.249%2C23.752%2C28.743%2C23.069z%22%3E%3C/path%3E%20%3Cpath%20fill%3D%22%231A1876%22%20d%3D%22M38.007%2C19.233H35.99c-0.625%2C0-1.092%2C0.171-1.367%2C0.794l-3.876%2C8.776h2.741c0%2C0%2C0.448-1.18%2C0.55-1.439%20c0.3%2C0%2C2.962%2C0.004%2C3.343%2C0.004c0.078%2C0.335%2C0.318%2C1.435%2C0.318%2C1.435h2.422L38.007%2C19.233z%20M34.789%2C25.406%20c0.108-0.276%2C1.173-3.011%2C1.386-3.591c0.353%2C1.651%2C0.009%2C0.049%2C0.781%2C3.591H34.789z%22%3E%3C/path%3E%20%3Cpath%20fill%3D%22%231A1876%22%20d%3D%22M17.049%2C19.231l-2.556%2C6.53l-0.272-1.327l-0.915-4.401c-0.158-0.606-0.616-0.787-1.183-0.808H7.913%20L7.88%2C19.424c1.024%2C0.248%2C1.939%2C0.606%2C2.742%2C1.05l2.321%2C8.317l2.762-0.003l4.109-9.558H17.049z%22%3E%3C/path%3E%3C/g%3E%3C/svg%3E"); }

#input--cc.creditcard-icon--master-card:before {
  background-image: url("data:image/svg+xml;utf8,%3Csvg%20class%3D%22nc-icon%20colored%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20xmlns%3Axlink%3D%22http%3A//www.w3.org/1999/xlink%22%20x%3D%220px%22%20y%3D%220px%22%20width%3D%2248px%22%20height%3D%2248px%22%20viewBox%3D%220%200%2048%2048%22%3E%3Cg%3E%3Cpath%20fill%3D%22%23003564%22%20d%3D%22M44%2C7H4c-1.657%2C0-3%2C1.343-3%2C3v28c0%2C1.657%2C1.343%2C3%2C3%2C3h40c1.657%2C0%2C3-1.343%2C3-3V10C47%2C8.343%2C45.657%2C7%2C44%2C7z%22%3E%3C/path%3E%20%3Ccircle%20fill%3D%22%23F01524%22%20cx%3D%2219%22%20cy%3D%2224%22%20r%3D%228%22%3E%3C/circle%3E%20%3Cpath%20fill%3D%22%23376BD1%22%20d%3D%22M24%2C30.24c0.093-0.075%2C0.177-0.161%2C0.267-0.24h-0.535C23.823%2C30.079%2C23.907%2C30.165%2C24%2C30.24z%22%3E%3C/path%3E%20%3Cpath%20fill%3D%22%23FEB415%22%20d%3D%22M29%2C16c-2.525%2C0-4.773%2C1.173-6.24%2C3h2.48c0.251%2C0.313%2C0.47%2C0.651%2C0.673%2C1h-3.827h-0.008%20c-0.186%2C0.321-0.352%2C0.653-0.492%2C1h0.009h4.809c0.132%2C0.324%2C0.246%2C0.656%2C0.335%2C1h-5.477c-0.084%2C0.326-0.151%2C0.659-0.193%2C1h5.865%20C26.975%2C23.328%2C27%2C23.661%2C27%2C24h-6c0%2C0.339%2C0.028%2C0.672%2C0.069%2C1h5.865c-0.043%2C0.341-0.111%2C0.674-0.195%2C1h-5.477%20c0.088%2C0.342%2C0.194%2C0.677%2C0.325%2C1h0.009h4.809c-0.141%2C0.346-0.305%2C0.68-0.491%2C1h-3.827h-0.008c0.203%2C0.351%2C0.429%2C0.686%2C0.681%2C1h2.48%20c-0.292%2C0.363-0.623%2C0.693-0.973%2C1h-0.535h-0.012c1.409%2C1.241%2C3.254%2C2%2C5.279%2C2c4.418%2C0%2C8-3.582%2C8-8S33.418%2C16%2C29%2C16z%22%3E%3C/path%3E%3C/g%3E%3C/svg%3E"); }

#input--cc.creditcard-icon--american-express:before {
  background-image: url("data:image/svg+xml;utf8,%3Csvg%20class%3D%22nc-icon%20colored%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20xmlns%3Axlink%3D%22http%3A//www.w3.org/1999/xlink%22%20x%3D%220px%22%20y%3D%220px%22%20width%3D%2248px%22%20height%3D%2248px%22%20viewBox%3D%220%200%2048%2048%22%3E%3Cg%3E%3Cpath%20fill%3D%22%23007AC6%22%20d%3D%22M44%2C7H4c-1.657%2C0-3%2C1.343-3%2C3v28c0%2C1.657%2C1.343%2C3%2C3%2C3h40c1.657%2C0%2C3-1.343%2C3-3V10C47%2C8.343%2C45.657%2C7%2C44%2C7z%22%3E%3C/path%3E%20%3Cpath%20fill%3D%22%23FFFFFF%22%20d%3D%22M10.533%2C24.429h2.33l-1.165-2.857L10.533%2C24.429z%20M43%2C19h-5.969l-1.456%2C1.571L34.264%2C19H21.598l-1.165%2C2.571%20L19.268%2C19h-5.096v1.143L13.59%2C19H9.222L5%2C29h5.096l0.582-1.571h1.456L12.716%2C29h5.678v-1.143L18.831%2C29h2.912l0.437-1.286V29%20h11.648l1.456-1.571L36.594%2C29h5.969l-3.785-5L43%2C19z%20M25.383%2C27.571h-1.602V22l-2.475%2C5.571h-1.456L17.375%2C22v5.571h-3.349%20L13.444%2C26H9.95l-0.582%2C1.571H7.475l3.057-7.143h2.475l2.766%2C6.714v-6.714h2.766l2.184%2C4.857l2.038-4.857h2.766v7.143H25.383z%20M39.797%2C27.571h-2.184l-1.893-2.429l-2.184%2C2.429h-6.552v-7.143h6.697l2.038%2C2.286l2.184-2.286h2.038L36.739%2C24L39.797%2C27.571z%20M28.586%2C21.857v1.286h3.64v1.429h-3.64V26h4.077l1.893-2.143l-1.747-2H28.586z%22%3E%3C/path%3E%3C/g%3E%3C/svg%3E"); }

#input--cc.creditcard-icon--discover:before {
  background-image: url("data:image/svg+xml;utf8,%3Csvg%20class%3D%22nc-icon%20colored%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20xmlns%3Axlink%3D%22http%3A//www.w3.org/1999/xlink%22%20x%3D%220px%22%20y%3D%220px%22%20width%3D%2248px%22%20height%3D%2248px%22%20viewBox%3D%220%200%2048%2048%22%3E%3Cg%3E%3Cpath%20fill%3D%22%23E6E6E6%22%20d%3D%22M47%2C23.807V10c0-1.657-1.343-3-3-3H4c-1.657%2C0-3%2C1.343-3%2C3v28c0%2C1.657%2C1.343%2C3%2C3%2C3h10.589%20C30.229%2C38.811%2C43.003%2C30.094%2C47%2C23.807z%22%3E%3C/path%3E%20%3Cpath%20fill%3D%22%23E6E6E6%22%20d%3D%22M47%2C38V23.807C43.003%2C30.094%2C30.229%2C38.811%2C14.589%2C41H44C45.657%2C41%2C47%2C39.657%2C47%2C38z%22%3E%3C/path%3E%20%3Cpath%20fill%3D%22%23FA7000%22%20d%3D%22M47%2C38V23.807C43.003%2C30.094%2C30.229%2C38.811%2C14.589%2C41H44C45.657%2C41%2C47%2C39.657%2C47%2C38z%22%3E%3C/path%3E%20%3Cpath%20fill%3D%22%23FA7000%22%20d%3D%22M25.029%2C21.013c-1.69%2C0-3.062%2C1.32-3.062%2C2.951c0%2C1.734%2C1.312%2C3.028%2C3.062%2C3.028%20c1.708%2C0%2C3.054-1.313%2C3.054-2.995C28.084%2C22.325%2C26.747%2C21.013%2C25.029%2C21.013z%22%3E%3C/path%3E%20%3Cpath%20fill%3D%22%23444444%22%20d%3D%22M7.646%2C21.121H6v5.743h1.636c0.871%2C0%2C1.499-0.207%2C2.05-0.664c0.654-0.541%2C1.043-1.359%2C1.043-2.206%20C10.728%2C22.298%2C9.462%2C21.121%2C7.646%2C21.121z%20M8.956%2C25.434c-0.356%2C0.318-0.81%2C0.457-1.535%2C0.457H7.121v-3.798h0.301%20c0.725%2C0%2C1.161%2C0.13%2C1.535%2C0.464c0.385%2C0.345%2C0.617%2C0.878%2C0.617%2C1.429C9.573%2C24.539%2C9.342%2C25.091%2C8.956%2C25.434z%22%3E%3C/path%3E%20%3Crect%20x%3D%2211.245%22%20y%3D%2221.121%22%20fill%3D%22%23444444%22%20width%3D%221.116%22%20height%3D%225.743%22%3E%3C/rect%3E%20%3Cpath%20fill%3D%22%23444444%22%20d%3D%22M15.102%2C23.322c-0.674-0.247-0.871-0.412-0.871-0.722c0-0.361%2C0.352-0.635%2C0.836-0.635%20c0.335%2C0%2C0.612%2C0.134%2C0.906%2C0.462l0.583-0.764c-0.481-0.424-1.058-0.638-1.686-0.638c-1.016%2C0-1.791%2C0.707-1.791%2C1.642%20c0%2C0.794%2C0.36%2C1.197%2C1.411%2C1.579c0.439%2C0.153%2C0.662%2C0.257%2C0.776%2C0.328c0.224%2C0.145%2C0.335%2C0.352%2C0.335%2C0.592%20c0%2C0.467-0.37%2C0.811-0.871%2C0.811c-0.533%2C0-0.964-0.267-1.222-0.768l-0.722%2C0.7c0.516%2C0.756%2C1.135%2C1.094%2C1.988%2C1.094%20c1.163%2C0%2C1.982-0.778%2C1.982-1.887C16.757%2C24.202%2C16.377%2C23.788%2C15.102%2C23.322z%22%3E%3C/path%3E%20%3Cpath%20fill%3D%22%23444444%22%20d%3D%22M17.108%2C23.994c0%2C1.689%2C1.326%2C2.998%2C3.032%2C2.998c0.481%2C0%2C0.894-0.095%2C1.402-0.335v-1.32%20c-0.449%2C0.451-0.843%2C0.629-1.353%2C0.629c-1.128%2C0-1.927-0.816-1.927-1.98c0-1.1%2C0.825-1.972%2C1.877-1.972%20c0.531%2C0%2C0.937%2C0.188%2C1.402%2C0.646v-1.318c-0.491-0.248-0.894-0.351-1.379-0.351C18.467%2C20.991%2C17.108%2C22.325%2C17.108%2C23.994z%22%3E%3C/path%3E%20%3Cpolygon%20fill%3D%22%23444444%22%20points%3D%2230.617%2C24.977%2029.086%2C21.121%2027.864%2C21.121%2030.299%2C27.009%2030.9%2C27.009%2033.382%2C21.121%2032.17%2C21.121%20%22%3E%3C/polygon%3E%20%3Cpolygon%20fill%3D%22%23444444%22%20points%3D%2233.89%2C26.864%2037.066%2C26.864%2037.066%2C25.891%2035.011%2C25.891%2035.011%2C24.341%2036.988%2C24.341%2036.988%2C23.368%2035.011%2C23.368%2035.011%2C22.093%2037.066%2C22.093%2037.066%2C21.121%2033.89%2C21.121%20%22%3E%3C/polygon%3E%20%3Cpath%20fill%3D%22%23444444%22%20d%3D%22M41.5%2C22.815c0-1.076-0.738-1.695-2.031-1.695h-1.664v5.743h1.123v-2.309h0.146l1.547%2C2.309H42l-1.807-2.421%20C41.037%2C24.271%2C41.5%2C23.694%2C41.5%2C22.815z%20M39.254%2C23.762h-0.325v-1.737h0.343c0.7%2C0%2C1.075%2C0.294%2C1.075%2C0.853%20C40.347%2C23.452%2C39.972%2C23.762%2C39.254%2C23.762z%22%3E%3C/path%3E%3C/g%3E%3C/svg%3E"); }


  .modal__container {
    display: -ms-flexbox;
    display: flex;
    max-width: 675px;
    min-height: 400px;
    margin-bottom: 125px;
    background-color: #ffffff;
    border-radius: 5px;
    box-shadow: 3px 3px 20px rgba(0, 0, 0, 0.1); }
  .modal__featured {
    position: relative;
    -ms-flex: 1;
        flex: 1;
    min-width: 230px;
    padding: 20px;
    overflow: hidden;
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px; }
  .modal__circle {
    position: absolute;
    top: 0;
    left: 0;
    height: 200%;
    width: 200%;
    background-color: #003681;
    border-radius: 50%;
    -ms-transform: translateX(-50%) translateY(-25%);
        transform: translateX(-50%) translateY(-25%); }
  .modal__product {
    position: absolute;
    top: 0;
    left: 50%;
    max-width: 85%;
    -ms-transform: translateX(calc(-50% - 10px));
        transform: translateX(calc(-50% - 10px)); }
  .modal__content {
    -ms-flex: 3;
        flex: 3;
    padding: 40px 30px; }
    .lds-roller {
	display: inline-block;
	width: 80px;
	height: 80px;
	top: 100px;
    left: 474px;
  }
  .lds-roller div {
	animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
	transform-origin: 40px 40px;
  }
  .lds-roller div:after {
	content: " ";
	display: block;
	position: absolute;
	width: 7px;
	height: 7px;
	border-radius: 50%;
	background: #0080FF;
	margin: -4px 0 0 -4px;
	
  }
  .lds-roller div:nth-child(1) {
	animation-delay: -0.036s;
  }
  .lds-roller div:nth-child(1):after {
	top: 63px;
	left: 63px;
  }
  .lds-roller div:nth-child(2) {
	animation-delay: -0.072s;
  }
  .lds-roller div:nth-child(2):after {
	top: 68px;
	left: 56px;
  }
  .lds-roller div:nth-child(3) {
	animation-delay: -0.108s;
  }
  .lds-roller div:nth-child(3):after {
	top: 71px;
	left: 48px;
  }
  .lds-roller div:nth-child(4) {
	animation-delay: -0.144s;
  }
  .lds-roller div:nth-child(4):after {
	top: 72px;
	left: 40px;
  }
  .lds-roller div:nth-child(5) {
	animation-delay: -0.18s;
  }
  .lds-roller div:nth-child(5):after {
	top: 71px;
	left: 32px;
  }
  .lds-roller div:nth-child(6) {
	animation-delay: -0.216s;
  }
  .lds-roller div:nth-child(6):after {
	top: 68px;
	left: 24px;
  }
  .lds-roller div:nth-child(7) {
	animation-delay: -0.252s;
  }
  .lds-roller div:nth-child(7):after {
	top: 63px;
	left: 17px;
  }
  .lds-roller div:nth-child(8) {
	animation-delay: -0.288s;
  }
  .lds-roller div:nth-child(8):after {
	top: 56px;
	left: 12px;
  }
  @keyframes lds-roller {
	0% {
	  transform: rotate(0deg);
	}
	100% {
	  transform: rotate(360deg);
	}
  }
  @-webkit-keyframes swal2-show{
    0%{
        -webkit-transform:scale(.7);
        transform:scale(.7)
    }
    45%{
        -webkit-transform:scale(1.05);
        transform:scale(1.05)
    }
    80%{
        -webkit-transform:scale(.95);
        transform:scale(.95)
    }
    100%{
        -webkit-transform:scale(1);
        transform:scale(1)
    }
}
@keyframes swal2-show{
    0%{
        -webkit-transform:scale(.7);
        transform:scale(.7)
    }
    45%{
        -webkit-transform:scale(1.05);
        transform:scale(1.05)
    }
    80%{
        -webkit-transform:scale(.95);
        transform:scale(.95)
    }
    100%{
        -webkit-transform:scale(1);
        transform:scale(1)
    }
}
@-webkit-keyframes swal2-hide{
    0%{
        -webkit-transform:scale(1);
        transform:scale(1);
        opacity:1
    }
    100%{
        -webkit-transform:scale(.5);
        transform:scale(.5);
        opacity:0
    }
}
@keyframes swal2-hide{
    0%{
        -webkit-transform:scale(1);
        transform:scale(1);
        opacity:1
    }
    100%{
        -webkit-transform:scale(.5);
        transform:scale(.5);
        opacity:0
    }
}
@-webkit-keyframes swal2-animate-success-line-tip{
    0%{
        top:1.1875em;
        left:.0625em;
        width:0
    }
    54%{
        top:1.0625em;
        left:.125em;
        width:0
    }
    70%{
        top:2.1875em;
        left:-.375em;
        width:3.125em
    }
    84%{
        top:3em;
        left:1.3125em;
        width:1.0625em
    }
    100%{
        top:2.8125em;
        left:.875em;
        width:1.5625em
    }
}
@keyframes swal2-animate-success-line-tip{
    0%{
        top:1.1875em;
        left:.0625em;
        width:0
    }
    54%{
        top:1.0625em;
        left:.125em;
        width:0
    }
    70%{
        top:2.1875em;
        left:-.375em;
        width:3.125em
    }
    84%{
        top:3em;
        left:1.3125em;
        width:1.0625em
    }
    100%{
        top:2.8125em;
        left:.875em;
        width:1.5625em
    }
}
@-webkit-keyframes swal2-animate-success-line-long{
    0%{
        top:3.375em;
        right:2.875em;
        width:0
    }
    65%{
        top:3.375em;
        right:2.875em;
        width:0
    }
    84%{
        top:2.1875em;
        right:0;
        width:3.4375em
    }
    100%{
        top:2.375em;
        right:.5em;
        width:2.9375em
    }
}
@keyframes swal2-animate-success-line-long{
    0%{
        top:3.375em;
        right:2.875em;
        width:0
    }
    65%{
        top:3.375em;
        right:2.875em;
        width:0
    }
    84%{
        top:2.1875em;
        right:0;
        width:3.4375em
    }
    100%{
        top:2.375em;
        right:.5em;
        width:2.9375em
    }
}
@-webkit-keyframes swal2-rotate-success-circular-line{
    0%{
        -webkit-transform:rotate(-45deg);
        transform:rotate(-45deg)
    }
    5%{
        -webkit-transform:rotate(-45deg);
        transform:rotate(-45deg)
    }
    12%{
        -webkit-transform:rotate(-405deg);
        transform:rotate(-405deg)
    }
    100%{
        -webkit-transform:rotate(-405deg);
        transform:rotate(-405deg)
    }
}
@keyframes swal2-rotate-success-circular-line{
    0%{
        -webkit-transform:rotate(-45deg);
        transform:rotate(-45deg)
    }
    5%{
        -webkit-transform:rotate(-45deg);
        transform:rotate(-45deg)
    }
    12%{
        -webkit-transform:rotate(-405deg);
        transform:rotate(-405deg)
    }
    100%{
        -webkit-transform:rotate(-405deg);
        transform:rotate(-405deg)
    }
}
@-webkit-keyframes swal2-animate-error-x-mark{
    0%{
        margin-top:1.625em;
        -webkit-transform:scale(.4);
        transform:scale(.4);
        opacity:0
    }
    50%{
        margin-top:1.625em;
        -webkit-transform:scale(.4);
        transform:scale(.4);
        opacity:0
    }
    80%{
        margin-top:-.375em;
        -webkit-transform:scale(1.15);
        transform:scale(1.15)
    }
    100%{
        margin-top:0;
        -webkit-transform:scale(1);
        transform:scale(1);
        opacity:1
    }
}
@keyframes swal2-animate-error-x-mark{
    0%{
        margin-top:1.625em;
        -webkit-transform:scale(.4);
        transform:scale(.4);
        opacity:0
    }
    50%{
        margin-top:1.625em;
        -webkit-transform:scale(.4);
        transform:scale(.4);
        opacity:0
    }
    80%{
        margin-top:-.375em;
        -webkit-transform:scale(1.15);
        transform:scale(1.15)
    }
    100%{
        margin-top:0;
        -webkit-transform:scale(1);
        transform:scale(1);
        opacity:1
    }
}
@-webkit-keyframes swal2-animate-error-icon{
    0%{
        -webkit-transform:rotateX(100deg);
        transform:rotateX(100deg);
        opacity:0
    }
    100%{
        -webkit-transform:rotateX(0);
        transform:rotateX(0);
        opacity:1
    }
}
@keyframes swal2-animate-error-icon{
    0%{
        -webkit-transform:rotateX(100deg);
        transform:rotateX(100deg);
        opacity:0
    }
    100%{
        -webkit-transform:rotateX(0);
        transform:rotateX(0);
        opacity:1
    }
}
body.swal2-toast-shown.swal2-has-input>.swal2-container>.swal2-toast{
    flex-direction:column;
    align-items:stretch
}
body.swal2-toast-shown.swal2-has-input>.swal2-container>.swal2-toast .swal2-actions{
    flex:1;
    align-self:stretch;
    justify-content:flex-end;
    height:2.2em
}
body.swal2-toast-shown.swal2-has-input>.swal2-container>.swal2-toast .swal2-loading{
    justify-content:center
}
body.swal2-toast-shown.swal2-has-input>.swal2-container>.swal2-toast .swal2-input{
    height:2em;
    margin:.3125em auto;
    font-size:1em
}
body.swal2-toast-shown.swal2-has-input>.swal2-container>.swal2-toast .swal2-validationerror{
    font-size:1em
}
body.swal2-toast-shown>.swal2-container{
    position:fixed;
    background-color:transparent
}
body.swal2-toast-shown>.swal2-container.swal2-shown{
    background-color:transparent
}
body.swal2-toast-shown>.swal2-container.swal2-top{
    top:0;
    right:auto;
    bottom:auto;
    left:50%;
    -webkit-transform:translateX(-50%);
    transform:translateX(-50%)
}
body.swal2-toast-shown>.swal2-container.swal2-top-end,body.swal2-toast-shown>.swal2-container.swal2-top-right{
    top:0;
    right:0;
    bottom:auto;
    left:auto
}
body.swal2-toast-shown>.swal2-container.swal2-top-left,body.swal2-toast-shown>.swal2-container.swal2-top-start{
    top:0;
    right:auto;
    bottom:auto;
    left:0
}
body.swal2-toast-shown>.swal2-container.swal2-center-left,body.swal2-toast-shown>.swal2-container.swal2-center-start{
    top:50%;
    right:auto;
    bottom:auto;
    left:0;
    -webkit-transform:translateY(-50%);
    transform:translateY(-50%)
}
body.swal2-toast-shown>.swal2-container.swal2-center{
    top:50%;
    right:auto;
    bottom:auto;
    left:50%;
    -webkit-transform:translate(-50%,-50%);
    transform:translate(-50%,-50%)
}
body.swal2-toast-shown>.swal2-container.swal2-center-end,body.swal2-toast-shown>.swal2-container.swal2-center-right{
    top:50%;
    right:0;
    bottom:auto;
    left:auto;
    -webkit-transform:translateY(-50%);
    transform:translateY(-50%)
}
body.swal2-toast-shown>.swal2-container.swal2-bottom-left,body.swal2-toast-shown>.swal2-container.swal2-bottom-start{
    top:auto;
    right:auto;
    bottom:0;
    left:0
}
body.swal2-toast-shown>.swal2-container.swal2-bottom{
    top:auto;
    right:auto;
    bottom:0;
    left:50%;
    -webkit-transform:translateX(-50%);
    transform:translateX(-50%)
}
body.swal2-toast-shown>.swal2-container.swal2-bottom-end,body.swal2-toast-shown>.swal2-container.swal2-bottom-right{
    top:auto;
    right:0;
    bottom:0;
    left:auto
}
.swal2-popup.swal2-toast{
    flex-direction:row;
    align-items:center;
    width:auto;
    padding:.625em;
    box-shadow:0 0 .625em #d9d9d9;
    overflow-y:hidden
}
.swal2-popup.swal2-toast .swal2-header{
    flex-direction:row
}
.swal2-popup.swal2-toast .swal2-title{
    justify-content:flex-start;
    margin:0 .6em;
    font-size:1em
}
.swal2-popup.swal2-toast .swal2-close{
    position:initial
}
.swal2-popup.swal2-toast .swal2-content{
    justify-content:flex-start;
    font-size:1em
}
.swal2-popup.swal2-toast .swal2-icon{
    width:2em;
    min-width:2em;
    height:2em;
    margin:0
}
.swal2-popup.swal2-toast .swal2-icon-text{
    font-size:2em;
    font-weight:700;
    line-height:1em
}
.swal2-popup.swal2-toast .swal2-icon.swal2-success .swal2-success-ring{
    width:2em;
    height:2em
}
.swal2-popup.swal2-toast .swal2-icon.swal2-error [class^=swal2-x-mark-line]{
    top:.875em;
    width:1.375em
}
.swal2-popup.swal2-toast .swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=left]{
    left:.3125em
}
.swal2-popup.swal2-toast .swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=right]{
    right:.3125em
}
.swal2-popup.swal2-toast .swal2-actions{
    height:auto;
    margin:0 .3125em
}
.swal2-popup.swal2-toast .swal2-styled{
    margin:0 .3125em;
    padding:.3125em .625em;
    font-size:1em
}
.swal2-popup.swal2-toast .swal2-styled:focus{
    box-shadow:0 0 0 .0625em #fff,0 0 0 .125em rgba(50,100,150,.4)
}
.swal2-popup.swal2-toast .swal2-success{
    border-color:#a5dc86
}
.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-circular-line]{
    position:absolute;
    width:2em;
    height:2.8125em;
    -webkit-transform:rotate(45deg);
    transform:rotate(45deg);
    border-radius:50%
}
.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-circular-line][class$=left]{
    top:-.25em;
    left:-.9375em;
    -webkit-transform:rotate(-45deg);
    transform:rotate(-45deg);
    -webkit-transform-origin:2em 2em;
    transform-origin:2em 2em;
    border-radius:4em 0 0 4em
}
.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-circular-line][class$=right]{
    top:-.25em;
    left:.9375em;
    -webkit-transform-origin:0 2em;
    transform-origin:0 2em;
    border-radius:0 4em 4em 0
}
.swal2-popup.swal2-toast .swal2-success .swal2-success-ring{
    width:2em;
    height:2em
}
.swal2-popup.swal2-toast .swal2-success .swal2-success-fix{
    top:0;
    left:.4375em;
    width:.4375em;
    height:2.6875em
}
.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-line]{
    height:.3125em
}
.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-line][class$=tip]{
    top:1.125em;
    left:.1875em;
    width:.75em
}
.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-line][class$=long]{
    top:.9375em;
    right:.1875em;
    width:1.375em
}
.swal2-popup.swal2-toast.swal2-show{
    -webkit-animation:showSweetToast .5s;
    animation:showSweetToast .5s
}
.swal2-popup.swal2-toast.swal2-hide{
    -webkit-animation:hideSweetToast .2s forwards;
    animation:hideSweetToast .2s forwards
}
.swal2-popup.swal2-toast .swal2-animate-success-icon .swal2-success-line-tip{
    -webkit-animation:animate-toast-success-tip .75s;
    animation:animate-toast-success-tip .75s
}
.swal2-popup.swal2-toast .swal2-animate-success-icon .swal2-success-line-long{
    -webkit-animation:animate-toast-success-long .75s;
    animation:animate-toast-success-long .75s
}
@-webkit-keyframes showSweetToast{
    0%{
        -webkit-transform:translateY(-.625em) rotateZ(2deg);
        transform:translateY(-.625em) rotateZ(2deg);
        opacity:0
    }
    33%{
        -webkit-transform:translateY(0) rotateZ(-2deg);
        transform:translateY(0) rotateZ(-2deg);
        opacity:.5
    }
    66%{
        -webkit-transform:translateY(.3125em) rotateZ(2deg);
        transform:translateY(.3125em) rotateZ(2deg);
        opacity:.7
    }
    100%{
        -webkit-transform:translateY(0) rotateZ(0);
        transform:translateY(0) rotateZ(0);
        opacity:1
    }
}
@keyframes showSweetToast{
    0%{
        -webkit-transform:translateY(-.625em) rotateZ(2deg);
        transform:translateY(-.625em) rotateZ(2deg);
        opacity:0
    }
    33%{
        -webkit-transform:translateY(0) rotateZ(-2deg);
        transform:translateY(0) rotateZ(-2deg);
        opacity:.5
    }
    66%{
        -webkit-transform:translateY(.3125em) rotateZ(2deg);
        transform:translateY(.3125em) rotateZ(2deg);
        opacity:.7
    }
    100%{
        -webkit-transform:translateY(0) rotateZ(0);
        transform:translateY(0) rotateZ(0);
        opacity:1
    }
}
@-webkit-keyframes hideSweetToast{
    0%{
        opacity:1
    }
    33%{
        opacity:.5
    }
    100%{
        -webkit-transform:rotateZ(1deg);
        transform:rotateZ(1deg);
        opacity:0
    }
}
@keyframes hideSweetToast{
    0%{
        opacity:1
    }
    33%{
        opacity:.5
    }
    100%{
        -webkit-transform:rotateZ(1deg);
        transform:rotateZ(1deg);
        opacity:0
    }
}
@-webkit-keyframes animate-toast-success-tip{
    0%{
        top:.5625em;
        left:.0625em;
        width:0
    }
    54%{
        top:.125em;
        left:.125em;
        width:0
    }
    70%{
        top:.625em;
        left:-.25em;
        width:1.625em
    }
    84%{
        top:1.0625em;
        left:.75em;
        width:.5em
    }
    100%{
        top:1.125em;
        left:.1875em;
        width:.75em
    }
}
@keyframes animate-toast-success-tip{
    0%{
        top:.5625em;
        left:.0625em;
        width:0
    }
    54%{
        top:.125em;
        left:.125em;
        width:0
    }
    70%{
        top:.625em;
        left:-.25em;
        width:1.625em
    }
    84%{
        top:1.0625em;
        left:.75em;
        width:.5em
    }
    100%{
        top:1.125em;
        left:.1875em;
        width:.75em
    }
}
@-webkit-keyframes animate-toast-success-long{
    0%{
        top:1.625em;
        right:1.375em;
        width:0
    }
    65%{
        top:1.25em;
        right:.9375em;
        width:0
    }
    84%{
        top:.9375em;
        right:0;
        width:1.125em
    }
    100%{
        top:.9375em;
        right:.1875em;
        width:1.375em
    }
}
@keyframes animate-toast-success-long{
    0%{
        top:1.625em;
        right:1.375em;
        width:0
    }
    65%{
        top:1.25em;
        right:.9375em;
        width:0
    }
    84%{
        top:.9375em;
        right:0;
        width:1.125em
    }
    100%{
        top:.9375em;
        right:.1875em;
        width:1.375em
    }
}
body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown){
    overflow-y:hidden
}
body.swal2-height-auto{
    height:auto!important
}
body.swal2-no-backdrop .swal2-shown{
    top:auto;
    right:auto;
    bottom:auto;
    left:auto;
    background-color:transparent
}
body.swal2-no-backdrop .swal2-shown>.swal2-modal{
    box-shadow:0 0 10px rgba(0,0,0,.4)
}
body.swal2-no-backdrop .swal2-shown.swal2-top{
    top:0;
    left:50%;
    -webkit-transform:translateX(-50%);
    transform:translateX(-50%)
}
body.swal2-no-backdrop .swal2-shown.swal2-top-left,body.swal2-no-backdrop .swal2-shown.swal2-top-start{
    top:0;
    left:0
}
body.swal2-no-backdrop .swal2-shown.swal2-top-end,body.swal2-no-backdrop .swal2-shown.swal2-top-right{
    top:0;
    right:0
}
body.swal2-no-backdrop .swal2-shown.swal2-center{
    top:50%;
    left:50%;
    -webkit-transform:translate(-50%,-50%);
    transform:translate(-50%,-50%)
}
body.swal2-no-backdrop .swal2-shown.swal2-center-left,body.swal2-no-backdrop .swal2-shown.swal2-center-start{
    top:50%;
    left:0;
    -webkit-transform:translateY(-50%);
    transform:translateY(-50%)
}
body.swal2-no-backdrop .swal2-shown.swal2-center-end,body.swal2-no-backdrop .swal2-shown.swal2-center-right{
    top:50%;
    right:0;
    -webkit-transform:translateY(-50%);
    transform:translateY(-50%)
}
body.swal2-no-backdrop .swal2-shown.swal2-bottom{
    bottom:0;
    left:50%;
    -webkit-transform:translateX(-50%);
    transform:translateX(-50%)
}
body.swal2-no-backdrop .swal2-shown.swal2-bottom-left,body.swal2-no-backdrop .swal2-shown.swal2-bottom-start{
    bottom:0;
    left:0
}
body.swal2-no-backdrop .swal2-shown.swal2-bottom-end,body.swal2-no-backdrop .swal2-shown.swal2-bottom-right{
    right:0;
    bottom:0
}
.swal2-container{
    display:flex;
    position:fixed;
    top:0;
    right:0;
    bottom:0;
    left:0;
    flex-direction:row;
    align-items:center;
    justify-content:center;
    padding:10px;
    background-color:transparent;
    z-index:1060;
    overflow-x:hidden;
    -webkit-overflow-scrolling:touch
}
.swal2-container.swal2-top{
    align-items:flex-start
}
.swal2-container.swal2-top-left,.swal2-container.swal2-top-start{
    align-items:flex-start;
    justify-content:flex-start
}
.swal2-container.swal2-top-end,.swal2-container.swal2-top-right{
    align-items:flex-start;
    justify-content:flex-end
}
.swal2-container.swal2-center{
    align-items:center
}
.swal2-container.swal2-center-left,.swal2-container.swal2-center-start{
    align-items:center;
    justify-content:flex-start
}
.swal2-container.swal2-center-end,.swal2-container.swal2-center-right{
    align-items:center;
    justify-content:flex-end
}
.swal2-container.swal2-bottom{
    align-items:flex-end
}
.swal2-container.swal2-bottom-left,.swal2-container.swal2-bottom-start{
    align-items:flex-end;
    justify-content:flex-start
}
.swal2-container.swal2-bottom-end,.swal2-container.swal2-bottom-right{
    align-items:flex-end;
    justify-content:flex-end
}
.swal2-container.swal2-grow-fullscreen>.swal2-modal{
    display:flex!important;
    flex:1;
    align-self:stretch;
    justify-content:center
}
.swal2-container.swal2-grow-row>.swal2-modal{
    display:flex!important;
    flex:1;
    align-content:center;
    justify-content:center
}
.swal2-container.swal2-grow-column{
    flex:1;
    flex-direction:column
}
.swal2-container.swal2-grow-column.swal2-bottom,.swal2-container.swal2-grow-column.swal2-center,.swal2-container.swal2-grow-column.swal2-top{
    align-items:center
}
.swal2-container.swal2-grow-column.swal2-bottom-left,.swal2-container.swal2-grow-column.swal2-bottom-start,.swal2-container.swal2-grow-column.swal2-center-left,.swal2-container.swal2-grow-column.swal2-center-start,.swal2-container.swal2-grow-column.swal2-top-left,.swal2-container.swal2-grow-column.swal2-top-start{
    align-items:flex-start
}
.swal2-container.swal2-grow-column.swal2-bottom-end,.swal2-container.swal2-grow-column.swal2-bottom-right,.swal2-container.swal2-grow-column.swal2-center-end,.swal2-container.swal2-grow-column.swal2-center-right,.swal2-container.swal2-grow-column.swal2-top-end,.swal2-container.swal2-grow-column.swal2-top-right{
    align-items:flex-end
}
.swal2-container.swal2-grow-column>.swal2-modal{
    display:flex!important;
    flex:1;
    align-content:center;
    justify-content:center
}
.swal2-container:not(.swal2-top):not(.swal2-top-start):not(.swal2-top-end):not(.swal2-top-left):not(.swal2-top-right):not(.swal2-center-start):not(.swal2-center-end):not(.swal2-center-left):not(.swal2-center-right):not(.swal2-bottom):not(.swal2-bottom-start):not(.swal2-bottom-end):not(.swal2-bottom-left):not(.swal2-bottom-right)>.swal2-modal{
    margin:auto
}
@media all and (-ms-high-contrast:none),(-ms-high-contrast:active){
    .swal2-container .swal2-modal{
        margin:0!important
    }
}
.swal2-container.swal2-fade{
    transition:background-color .1s
}
.swal2-container.swal2-shown{
    background-color:rgba(0,0,0,.4)
}
.swal2-popup{
    display:none;
    position:relative;
    flex-direction:column;
    justify-content:center;
    width:32em;
    max-width:100%;
    padding:1.25em;
    border-radius:.3125em;
    background:#fff;
    font-family:inherit;
    font-size:1rem;
    box-sizing:border-box
}
.swal2-popup:focus{
    outline:0
}
.swal2-popup.swal2-loading{
    overflow-y:hidden
}
.swal2-popup .swal2-header{
    display:flex;
    flex-direction:column;
    align-items:center
}
.swal2-popup .swal2-title{
    display:block;
    position:relative;
    max-width:100%;
    margin:0 0 .4em;
    padding:0;
    color:#595959;
    font-size:1.875em;
    font-weight:600;
    text-align:center;
    text-transform:none;
    word-wrap:break-word
}
.swal2-popup .swal2-actions{
    align-items:center;
    justify-content:center;
    margin:1.25em auto 0
}
.swal2-popup .swal2-actions:not(.swal2-loading) .swal2-styled[disabled]{
    opacity:.4
}
.swal2-popup .swal2-actions:not(.swal2-loading) .swal2-styled:hover{
    background-image:linear-gradient(rgba(0,0,0,.1),rgba(0,0,0,.1))
}
.swal2-popup .swal2-actions:not(.swal2-loading) .swal2-styled:active{
    background-image:linear-gradient(rgba(0,0,0,.2),rgba(0,0,0,.2))
}
.swal2-popup .swal2-actions.swal2-loading .swal2-styled.swal2-confirm{
    width:2.5em;
    height:2.5em;
    margin:.46875em;
    padding:0;
    border:.25em solid transparent;
    border-radius:100%;
    border-color:transparent;
    background-color:transparent!important;
    color:transparent;
    cursor:default;
    box-sizing:border-box;
    -webkit-animation:swal2-rotate-loading 1.5s linear 0s infinite normal;
    animation:swal2-rotate-loading 1.5s linear 0s infinite normal;
    -webkit-user-select:none;
    -moz-user-select:none;
    -ms-user-select:none;
    user-select:none
}
.swal2-popup .swal2-actions.swal2-loading .swal2-styled.swal2-cancel{
    margin-right:30px;
    margin-left:30px
}
.swal2-popup .swal2-actions.swal2-loading :not(.swal2-styled).swal2-confirm::after{
    display:inline-block;
    width:15px;
    height:15px;
    margin-left:5px;
    border:3px solid #999;
    border-radius:50%;
    border-right-color:transparent;
    box-shadow:1px 1px 1px #fff;
    content:'';
    -webkit-animation:swal2-rotate-loading 1.5s linear 0s infinite normal;
    animation:swal2-rotate-loading 1.5s linear 0s infinite normal
}
.swal2-popup .swal2-styled{
    margin:0 .3125em;
    padding:.625em 2em;
    font-weight:500;
    box-shadow:none
}
.swal2-popup .swal2-styled:not([disabled]){
    cursor:pointer
}
.swal2-popup .swal2-styled.swal2-confirm{
    border:0;
    border-radius:.25em;
    background:initial;
    background-color:#3085d6;
    color:#fff;
    font-size:1.0625em
}
.swal2-popup .swal2-styled.swal2-cancel{
    border:0;
    border-radius:.25em;
    background:initial;
    background-color:#aaa;
    color:#fff;
    font-size:1.0625em
}
.swal2-popup .swal2-styled:focus{
    outline:0;
    box-shadow:0 0 0 2px #fff,0 0 0 4px rgba(50,100,150,.4)
}
.swal2-popup .swal2-styled::-moz-focus-inner{
    border:0
}
.swal2-popup .swal2-footer{
    justify-content:center;
    margin:1.25em 0 0;
    padding-top:1em;
    border-top:1px solid #eee;
    color:#545454;
    font-size:1em
}
.swal2-popup .swal2-image{
    max-width:100%;
    margin:1.25em auto
}
.swal2-popup .swal2-close{
    position:absolute;
    top:0;
    right:0;
    justify-content:center;
    width:1.2em;
    height:1.2em;
    padding:0;
    transition:color .1s ease-out;
    border:none;
    border-radius:0;
    background:0 0;
    color:#ccc;
    font-family:serif;
    font-size:2.5em;
    line-height:1.2;
    cursor:pointer;
    overflow:hidden
}
.swal2-popup .swal2-close:hover{
    -webkit-transform:none;
    transform:none;
    color:#f27474
}
.swal2-popup>.swal2-checkbox,.swal2-popup>.swal2-file,.swal2-popup>.swal2-input,.swal2-popup>.swal2-radio,.swal2-popup>.swal2-select,.swal2-popup>.swal2-textarea{
    display:none
}
.swal2-popup .swal2-content{
    justify-content:center;
    margin:0;
    padding:0;
    color:#545454;
    font-size:1.125em;
    font-weight:300;
    line-height:normal;
    word-wrap:break-word
}
.swal2-popup #swal2-content{
    text-align:center
}
.swal2-popup .swal2-checkbox,.swal2-popup .swal2-file,.swal2-popup .swal2-input,.swal2-popup .swal2-radio,.swal2-popup .swal2-select,.swal2-popup .swal2-textarea{
    margin:1em auto
}
.swal2-popup .swal2-file,.swal2-popup .swal2-input,.swal2-popup .swal2-textarea{
    width:100%;
    transition:border-color .3s,box-shadow .3s;
    border:1px solid #d9d9d9;
    border-radius:.1875em;
    font-size:1.125em;
    box-shadow:inset 0 1px 1px rgba(0,0,0,.06);
    box-sizing:border-box
}
.swal2-popup .swal2-file.swal2-inputerror,.swal2-popup .swal2-input.swal2-inputerror,.swal2-popup .swal2-textarea.swal2-inputerror{
    border-color:#f27474!important;
    box-shadow:0 0 2px #f27474!important
}
.swal2-popup .swal2-file:focus,.swal2-popup .swal2-input:focus,.swal2-popup .swal2-textarea:focus{
    border:1px solid #b4dbed;
    outline:0;
    box-shadow:0 0 3px #c4e6f5
}
.swal2-popup .swal2-file::-webkit-input-placeholder,.swal2-popup .swal2-input::-webkit-input-placeholder,.swal2-popup .swal2-textarea::-webkit-input-placeholder{
    color:#ccc
}
.swal2-popup .swal2-file:-ms-input-placeholder,.swal2-popup .swal2-input:-ms-input-placeholder,.swal2-popup .swal2-textarea:-ms-input-placeholder{
    color:#ccc
}
.swal2-popup .swal2-file::-ms-input-placeholder,.swal2-popup .swal2-input::-ms-input-placeholder,.swal2-popup .swal2-textarea::-ms-input-placeholder{
    color:#ccc
}
.swal2-popup .swal2-file::placeholder,.swal2-popup .swal2-input::placeholder,.swal2-popup .swal2-textarea::placeholder{
    color:#ccc
}
.swal2-popup .swal2-range input{
    width:80%
}
.swal2-popup .swal2-range output{
    width:20%;
    font-weight:600;
    text-align:center
}
.swal2-popup .swal2-range input,.swal2-popup .swal2-range output{
    height:2.625em;
    margin:1em auto;
    padding:0;
    font-size:1.125em;
    line-height:2.625em
}
.swal2-popup .swal2-input{
    height:2.625em;
    padding:.75em
}
.swal2-popup .swal2-input[type=number]{
    max-width:10em
}
.swal2-popup .swal2-file{
    font-size:1.125em
}
.swal2-popup .swal2-textarea{
    height:6.75em;
    padding:.75em
}
.swal2-popup .swal2-select{
    min-width:50%;
    max-width:100%;
    padding:.375em .625em;
    color:#545454;
    font-size:1.125em
}
.swal2-popup .swal2-checkbox,.swal2-popup .swal2-radio{
    align-items:center;
    justify-content:center
}
.swal2-popup .swal2-checkbox label,.swal2-popup .swal2-radio label{
    margin:0 .6em;
    font-size:1.125em
}
.swal2-popup .swal2-checkbox input,.swal2-popup .swal2-radio input{
    margin:0 .4em
}
.swal2-popup .swal2-validationerror{
    display:none;
    align-items:center;
    justify-content:center;
    padding:.625em;
    background:#f0f0f0;
    color:#666;
    font-size:1em;
    font-weight:300;
    overflow:hidden
}
.swal2-popup .swal2-validationerror::before{
    display:inline-block;
    width:1.5em;
    min-width:1.5em;
    height:1.5em;
    margin:0 .625em;
    border-radius:50%;
    background-color:#f27474;
    color:#fff;
    font-weight:600;
    line-height:1.5em;
    text-align:center;
    content:'!';
    zoom:normal
}
@supports (-ms-accelerator:true){
    .swal2-range input{
        width:100%!important
    }
    .swal2-range output{
        display:none
    }
}
@media all and (-ms-high-contrast:none),(-ms-high-contrast:active){
    .swal2-range input{
        width:100%!important
    }
    .swal2-range output{
        display:none
    }
}
@-moz-document url-prefix(){
    .swal2-close:focus{
        outline:2px solid rgba(50,100,150,.4)
    }
}
.swal2-icon{
    position:relative;
    justify-content:center;
    width:5em;
    height:5em;
    margin:1.25em auto 1.875em;
    border:.25em solid transparent;
    border-radius:50%;
    line-height:5em;
    cursor:default;
    box-sizing:content-box;
    -webkit-user-select:none;
    -moz-user-select:none;
    -ms-user-select:none;
    user-select:none;
    zoom:normal
}
.swal2-icon-text{
    font-size:3.75em
}
.swal2-icon.swal2-error{
    border-color:#f27474
}
.swal2-icon.swal2-error .swal2-x-mark{
    position:relative;
    flex-grow:1
}
.swal2-icon.swal2-error [class^=swal2-x-mark-line]{
    display:block;
    position:absolute;
    top:2.3125em;
    width:2.9375em;
    height:.3125em;
    border-radius:.125em;
    background-color:#f27474
}
.swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=left]{
    left:1.0625em;
    -webkit-transform:rotate(45deg);
    transform:rotate(45deg)
}
.swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=right]{
    right:1em;
    -webkit-transform:rotate(-45deg);
    transform:rotate(-45deg)
}
.swal2-icon.swal2-warning{
    border-color:#facea8;
    color:#f8bb86
}
.swal2-icon.swal2-info{
    border-color:#9de0f6;
    color:#3fc3ee
}
.swal2-icon.swal2-question{
    border-color:#c9dae1;
    color:#87adbd
}
.swal2-icon.swal2-success{
    border-color:#a5dc86
}
.swal2-icon.swal2-success [class^=swal2-success-circular-line]{
    position:absolute;
    width:3.75em;
    height:7.5em;
    -webkit-transform:rotate(45deg);
    transform:rotate(45deg);
    border-radius:50%
}
.swal2-icon.swal2-success [class^=swal2-success-circular-line][class$=left]{
    top:-.4375em;
    left:-2.0635em;
    -webkit-transform:rotate(-45deg);
    transform:rotate(-45deg);
    -webkit-transform-origin:3.75em 3.75em;
    transform-origin:3.75em 3.75em;
    border-radius:7.5em 0 0 7.5em
}
.swal2-icon.swal2-success [class^=swal2-success-circular-line][class$=right]{
    top:-.6875em;
    left:1.875em;
    -webkit-transform:rotate(-45deg);
    transform:rotate(-45deg);
    -webkit-transform-origin:0 3.75em;
    transform-origin:0 3.75em;
    border-radius:0 7.5em 7.5em 0
}
.swal2-icon.swal2-success .swal2-success-ring{
    position:absolute;
    top:-.25em;
    left:-.25em;
    width:100%;
    height:100%;
    border:.25em solid rgba(165,220,134,.3);
    border-radius:50%;
    z-index:2;
    box-sizing:content-box
}
.swal2-icon.swal2-success .swal2-success-fix{
    position:absolute;
    top:.5em;
    left:1.625em;
    width:.4375em;
    height:5.625em;
    -webkit-transform:rotate(-45deg);
    transform:rotate(-45deg);
    z-index:1
}
.swal2-icon.swal2-success [class^=swal2-success-line]{
    display:block;
    position:absolute;
    height:.3125em;
    border-radius:.125em;
    background-color:#a5dc86;
    z-index:2
}
.swal2-icon.swal2-success [class^=swal2-success-line][class$=tip]{
    top:2.875em;
    left:.875em;
    width:1.5625em;
    -webkit-transform:rotate(45deg);
    transform:rotate(45deg)
}
.swal2-icon.swal2-success [class^=swal2-success-line][class$=long]{
    top:2.375em;
    right:.5em;
    width:2.9375em;
    -webkit-transform:rotate(-45deg);
    transform:rotate(-45deg)
}
.swal2-progresssteps{
    align-items:center;
    margin:0 0 1.25em;
    padding:0;
    font-weight:600
}
.swal2-progresssteps li{
    display:inline-block;
    position:relative
}
.swal2-progresssteps .swal2-progresscircle{
    width:2em;
    height:2em;
    border-radius:2em;
    background:#3085d6;
    color:#fff;
    line-height:2em;
    text-align:center;
    z-index:20
}
.swal2-progresssteps .swal2-progresscircle:first-child{
    margin-left:0
}
.swal2-progresssteps .swal2-progresscircle:last-child{
    margin-right:0
}
.swal2-progresssteps .swal2-progresscircle.swal2-activeprogressstep{
    background:#3085d6
}
.swal2-progresssteps .swal2-progresscircle.swal2-activeprogressstep~.swal2-progresscircle{
    background:#add8e6
}
.swal2-progresssteps .swal2-progresscircle.swal2-activeprogressstep~.swal2-progressline{
    background:#add8e6
}
.swal2-progresssteps .swal2-progressline{
    width:2.5em;
    height:.4em;
    margin:0 -1px;
    background:#3085d6;
    z-index:10
}
[class^=swal2]{
    -webkit-tap-highlight-color:transparent
}
.swal2-show{
    -webkit-animation:swal2-show .3s;
    animation:swal2-show .3s
}
.swal2-show.swal2-noanimation{
    -webkit-animation:none;
    animation:none
}
.swal2-hide{
    -webkit-animation:swal2-hide .15s forwards;
    animation:swal2-hide .15s forwards
}
.swal2-hide.swal2-noanimation{
    -webkit-animation:none;
    animation:none
}
[dir=rtl] .swal2-close{
    right:auto;
    left:0
}
.swal2-animate-success-icon .swal2-success-line-tip{
    -webkit-animation:swal2-animate-success-line-tip .75s;
    animation:swal2-animate-success-line-tip .75s
}
.swal2-animate-success-icon .swal2-success-line-long{
    -webkit-animation:swal2-animate-success-line-long .75s;
    animation:swal2-animate-success-line-long .75s
}
.swal2-animate-success-icon .swal2-success-circular-line-right{
    -webkit-animation:swal2-rotate-success-circular-line 4.25s ease-in;
    animation:swal2-rotate-success-circular-line 4.25s ease-in
}
.swal2-animate-error-icon{
    -webkit-animation:swal2-animate-error-icon .5s;
    animation:swal2-animate-error-icon .5s
}
.swal2-animate-error-icon .swal2-x-mark{
    -webkit-animation:swal2-animate-error-x-mark .5s;
    animation:swal2-animate-error-x-mark .5s
}
@-webkit-keyframes swal2-rotate-loading{
    0%{
        -webkit-transform:rotate(0);
        transform:rotate(0)
    }
    100%{
        -webkit-transform:rotate(360deg);
        transform:rotate(360deg)
    }
}
@keyframes swal2-rotate-loading{
    0%{
        -webkit-transform:rotate(0);
        transform:rotate(0)
    }
    100%{
        -webkit-transform:rotate(360deg);
        transform:rotate(360deg)
    }
}
@media screen and (max-device-width : 480px) {
    .jconfirm-box .jconfirm-hilight-shake .jconfirm-type-default .jconfirm-type-animated{
    width:300px !important;
}
.jconfirm-box{
    width:300px !important;
}
}

  </style>
  <main id="main" style="margin-top:20px !important;">
        <!-- ======= Team Section ======= -->
      <div class="container">

      <div class="section-title py-1 px-lg-1">
          <h2 style="font-size: 26px;
    text-align: left;
    font-weight: 300;
    color: #666;" data-aos="fade-up">Mi Cuenta</h2>
        </div>
        <?php if (($_REQUEST['Status']=='') || ($_REQUEST['Status']==null)) :?>
        <div class="row">
          <div class="col">
      
<ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home" >Artículos ganados</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu5">Ganados al momento</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1" >Cambiar contraseña</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu2">Editar perfil</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu4">Información de envío</a>
    </li>
    
  
  </ul>
            <div class="tab-content">

              <!-- Items WON -->
              <div id="home" class="tab-pane fade  active show">
                <h3 class="text-center p-3">Artículos ganados</h3>
                <div class="row">
                  <?php if(count($itemsWon) > 0): ?>
                    <?php foreach ($itemsWon as $key => $value): 
                        $imagecat = $value['f_primary_image'];
                    ?>
                        <div class="col-lg-3 col-md-4" data-aos="fade-up">
                            <div class="member" style="    
                        width:220px;
                        margin-bottom: 20px;
    overflow: hidden;
    text-align: center;
    border-radius: 5px;
    background: #fff;
    box-shadow: 0px 1px 6px rgb(230,231,231)">
                                <div class="member-img">
                                    <img src="<?php echo HOME_URL ?>rimage/products/<?php echo $imagecat.'.original.jpg';?>"  style="width: 200px;height:210px;text-align: center;vertical-align: middle" class="same-size" />
                                </div>
                                <div class="member-info text-left" style="margin: 10px;">
                                <h5 class="x" style="font-size:13px !important;margin-top:10px;" id="<?php echo $value['f_lots_id']?>" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;" title="<?php echo $value['f_title']; ?>"><?php echo $value['f_title']; ?></h5>
                                    <p class="m-0"  style="font-size:12px !important;">Número de lote:<strong> <?php echo $value['f_number']; ?></strong></p>
                                    <p class="m-0"  style="font-size:12px !important;">Fecha de inicio: <?php 
                                                          setlocale(LC_TIME, "spanish");
                                                          $mi_fecha = $value['f_start_date'];
                                                          $mi_fecha = str_replace("/", "-", $mi_fecha);			
                                                          $Nueva_Fecha = date("d-m-Y", strtotime($mi_fecha));				
                                                          $Mes_Anyo = strftime("%a, %d de %b de %Y", strtotime($Nueva_Fecha));
                                                          echo utf8_encode($Mes_Anyo)
                                    ?></p>
                                    <p class="m-0"  style="font-size:12px !important;">Apuesta más alta: $ <?php echo number_format($value['f_current_bid'], 2); ?></p>
                                    <p class="m-0"  style="font-size:12px !important;">Envío: $ <?php echo number_format($value['amout'], 2); ?></p>
                                    <p class="m-0"  style="font-size:12px !important;">Total: $ <?php echo number_format(($value['amout']+$value['f_current_bid']), 2); ?></p>
					
			  <?php if ($value['f_status'] == 3){  ?>			
          <form action="<?php echo $paypal_url; ?>" method="POST" name="payform">
            <input type="hidden" name="custom" value="<?php echo $customer['f_customer_id']."_".$customer['f_email'] ?>">
            <INPUT TYPE="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="business" value="<?php echo $business_email; ?>">
            <INPUT TYPE="hidden" name="charset" value="utf-8">
            <INPUT TYPE="hidden" NAME="return" value="<?php echo HOME_URL.'thanku.php?id='.$value['f_lots_id'].'&userid='.$customer['f_customer_id'].'&username='.$customer['f_username'].'&amount='.$value['f_current_bid'].'#team'; ?>">
            <INPUT TYPE="hidden" NAME="currency_code" value="MXN">
            <INPUT TYPE="hidden" NAME="amount" value="<?php echo $value['f_current_bid']; ?>">
            <INPUT TYPE="hidden" NAME="shipping" value="<?php echo $value['amout']; ?>">
            <INPUT TYPE="hidden" NAME="item_name" value="<?php echo $value['f_title']; ?>">
            <INPUT TYPE="hidden" NAME="item_number" value="<?php echo "AB Lot No.".$value['f_lots_id']; ?>">
            <INPUT TYPE="hidden" NAME="rm" value="2">
            <INPUT TYPE="hidden" NAME="image_url" value="http://45.79.135.15/new-layout/assets/img/VA_Logo.png">

            <button class="btn btn-info btn-block btn-xs btn-script-pay"  class="pay-now" ><i class="fab fa-paypal"></i>ay now</button>
                            
          </form> 
          <button class="btn btn-info btn-block btn-xs btn-script-pay"  
            onclick="ValidarTarjeta('<?php echo $value['f_current_bid']; ?>','<?php echo $customer['f_customer_id']; ?>','<?php echo $customer['f_email']; ?>','<?php echo $value['f_lots_id']; ?>','<?php echo $value['f_number']; ?>','<?php echo $value['f_title']; ?>')" style="background-color:#003681;margin-top: 10px;">Tarjeta bancaria</button>
			  <?php }else if ($value['f_status'] == 4){   ?>	  
			  <?php }    ?>			  
									
								 
                                </div>
                            </div>
                            
                        </div>
                    <?php endforeach; ?>
                  <?php else: ?>
                  <div class="col">
                    <div class="text-center"><h2>No hay información para mostrar</h2></div>
                  </div>
                  <?php endif; ?>
                </div>
                          <form action="<?php echo $paypal_url; ?>" method="POST" name="payform">
            <input type="hidden" name="custom" value="<?php echo $customer['f_customer_id']."_".$customer['f_email'] ?>">
            <INPUT TYPE="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="business" value="<?php echo $business_email; ?>">
            <INPUT TYPE="hidden" name="charset" value="utf-8">
            <INPUT TYPE="hidden" NAME="return" value="<?php echo HOME_URL.'thanku.php?id='.$value['f_lots_id'].'&userid='.$customer['f_customer_id'].'&username='.$customer['f_username'].'&amount='.$value['f_current_bid'].'#team'; ?>">
            <INPUT TYPE="hidden" NAME="currency_code" value="MXN">
            <INPUT TYPE="hidden" NAME="amount" value="<?php echo $value['f_current_bid']; ?>">
            <INPUT TYPE="hidden" NAME="shipping" value="<?php echo $value['amout']; ?>">
            <INPUT TYPE="hidden" NAME="item_name" value="<?php echo $value['f_title']; ?>">
            <INPUT TYPE="hidden" NAME="item_number" value="<?php echo "AB Lot No.".$value['f_lots_id']; ?>">
            <INPUT TYPE="hidden" NAME="rm" value="2">
            <INPUT TYPE="hidden" NAME="image_url" value="http://45.79.135.15/new-layout/assets/img/VA_Logo.png">
          </form> 
          <div class="row" id="exampleModal" style="margin:0 auto;display:none;">
    <div class="modalPago__container">
      <div class="modal__featured">
        <div class="modal__circle"></div>
        <img src="https://subastas.maxilana.com/pages/logopago.png" class="modal__product" style="margin-top: 175px;"/>
      </div>
      <div class="modal__content">
        <h2>Detalles de su pago</h2>

        
          <ul class="form-list">
            <li class="form-list__row">
              <label>Titular de la tarjeta</label>
              <input type="text" name="" id="nameCard" required="" />
            </li>
            <li class="form-list__row">
              <label>Número de tarjeta</label>
              <div id="input--cc" class="creditcard-icon">
                <input type="text" id="txtTarjeta" name="cc_number" required="" maxlength="16" />
              </div>
            </li>
            <li class="form-list__row form-list__row--inline">
              <div>
                <label>Fecha de vencimiento</label>
                <div class="form-list__input-inline">
                  <input type="text" name="cc_month" id="cc_month" placeholder="MM" minlength="2" maxlength="2" required="" />
                  <input type="text" name="cc_year" id="cc_year" placeholder="YY"  minlength="2" maxlength="2" required="" />
                </div>
              </div>
              <div>
                <label>
                  CVC
                </label>
                <input type="password" name="cc_cvc" id="cc_cvc" placeholder="123"  minlength="3" maxlength="4" required="" />
              </div>
            </li>
            <li class="form-list__row form-list__row--inline">
              <div>
                <label>Domicilio de envío</label>
                <div class="form-list__input-inline">
                  <select class="form-control" id="exampleFormControlSelect1" style="width: 100%">
                  </select>
                </div>
              </div>
            </li>
            <li>
              <input type="text" id="total" type="hidden"></input>
              <button onclick="PagarMaxilana()" class="button">Pagar</button>
              <button onclick="CerrarPago()"  style="background-color: gray;" class="button">Cancelar</button>
            </li>
          </ul>
      </div> <!-- END: .modal__content -->
    </div> <!-- END: .modal__container -->
  </div> <!-- END: .modal -->

              </div>

              <!-- CHANGE PASSWORD -->
              <div id="menu1" class="tab-pane fade">
                <h3 class="text-center p-3">Cambiar contraseña</h3>
                <div class="row">
                  <div class="col-9 align-self-center">
                    <form id="passwordDetails">
                      <div class="form-group row">
                        <label for="currentPassword" class="col-sm-4 col-form-label">*Contraseña actual</label>
                        <div class="col-sm-8">
                          <input type="password" class="form-control" id="currentPassword" name="currentPassword" placeholder="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputPassword" class="col-sm-4 col-form-label">*Nueva contraseña</label>
                        <div class="col-sm-8">
                          <input type="password" class="form-control" id="inputPassword" name="password" placeholder="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="confirmPassword" class="col-sm-4 col-form-label">*Confirmar contraseña</label>
                        <div class="col-sm-8">
                          <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col text-right">
                          <span class="btn btn-success btn-script-pass">Guardar</span>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <div id="menu5" class="tab-pane fade">
                <h3 class="text-center p-3">Artículos ganados al momento</h3>
                <div class="row">
                  <?php if(count($itemsWonTemporaly) > 0): ?>
                    <?php foreach ($itemsWonTemporaly as $key => $value): 
                        $imagecat = $value['f_primary_image'];
                    ?>
                        <div class="col-lg-3 col-md-4" data-aos="fade-up">
                            <div class="member" style="width:220px;
                        margin-bottom: 20px;
    overflow: hidden;
    text-align: center;
    border-radius: 5px;
    background: #fff;
    box-shadow: 0px 1px 6px rgb(230,231,231)">>
                                <div class="member-img">
                                <img src="<?php echo HOME_URL ?>rimage/products/<?php echo $imagecat.'.original.jpg';?>"  style="width: 200px;height:210px;text-align: center;vertical-align: middle" class="same-size" />
                                </div>
                                <div class="member-info text-left" style="margin:10px;">
                                    <h5 class="text-center" id="<?php echo $value['f_number']; ?>"><?php echo $value['f_title']; ?></h5>
                                    <p class="m-0" style="font-size:12px !important;">Número de lote: <?php echo $value['f_number']; ?></p>
                                    <p class="m-0" style="font-size:12px !important;">Fecha de inicio: <?php
                                                           setlocale(LC_TIME, "spanish");
                                                           $mi_fecha = $value['f_start_date'];
                                                           $mi_fecha = str_replace("/", "-", $mi_fecha);			
                                                           $Nueva_Fecha = date("d-m-Y", strtotime($mi_fecha));				
                                                           $Mes_Anyo = strftime("%a, %d de %b de %Y", strtotime($Nueva_Fecha));
                                                           echo utf8_encode($Mes_Anyo) ?></p>
                                    <p class="m-0" style="font-size:12px !important;">Oferta actual: $ <?php echo number_format($value['f_current_bid'], 2); ?></p>
                                </div>
                            </div>
                        </div>
                          
                          <?php endforeach; ?>
                            <?php endif; ?>
                </div>
              </div>


              <!-- Edit account -->
              <div id="menu2" class="tab-pane fade">
                <h3 class="text-center p-3">Perfil</h3>
                <div class="row">
                  <div class="col-9 align-self-center">
                    <form id="formDetails">

                      <div class="accountInfo">
                        <h4>Información personal</h4>

                        <div class="form-group row">
                          <label for="firstName" class="col-sm-4 col-form-label">Nombre de usuario</label>
                          <div class="col-sm-8">
                            <?php echo $customer['f_username'] ?>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="firstName" class="col-sm-4 col-form-label">*Nombre(s)</label>
                          <div class="col-sm-8">
                            <input type="text" value="<?php echo $customer['f_firstname'] ?>" class="form-control" id="firstName" name="firstName" placeholder="">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="lastName" class="col-sm-4 col-form-label">*Apellido(s)</label>
                          <div class="col-sm-8">
                            <input type="text" value="<?php echo $customer['f_lastname'] ?>" class="form-control" id="lastName" name="lastName" placeholder="">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="email" class="col-sm-4 col-form-label">*E-mail</label>
                          <div class="col-sm-8">
                            <input type="email" value="<?php echo $customer['f_email'] ?>" class="form-control" id="email" name="email" placeholder="">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="phoneNumber" class="col-sm-4 col-form-label">*Teléfono</label>
                          <div class="col-sm-8">
                            <input type="text" value="<?php echo $customer['f_telephone'] ?>" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="">
                          </div>
                        </div>
                        <div class="form-group row"> 
                          <label for="Paddle" class="col-sm-4 col-form-label">Número de paleta</label>
                          <div class="col-sm-8">
                            <input type="text" value="<?php echo $customer['paddle_number'] ?>" maxlength = "4" class="form-control" id="Paddle" name="paddleNumber" placeholder="" onkeypress="return valideKey(event);" onkeyup="validarEntero(this)">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col text-right">
                          <span class="btn btn-success btn-script-edit">Guardar</span>
                        </div>
                      </div>


                    </form>
                  </div>
                </div>
              </div>
              <div id="menu4" class="tab-pane fade">
                <h3 class="text-center p-3">Información de envío</h3>
                <div class="row">
                  <div class="col-9 align-self-center" id="informacionenvio" style="display:inline-flex;">
                    
                  </div>
                </div>
                <div class="row" id="ModalEnvio" style="margin:0 auto;display:none;">
    <div class="modal__container">
      <div class="modal__featured">
        <div class="modal__circle"></div>
        <img src="https://subastas.maxilana.com/pages/logopago.png" class="modal__product" style="margin-top: 175px;"/>
      </div>
      <div class="modal__content">
        <h2>Dirección de envío</h2>

        
          <ul class="form-list">
            <li class="form-list__row">
              <label>*Direccion</label>
              <input type="text" name="" id="Direccion" required="" />
            </li>
            <li class="form-list__row">
              <label>*Colonia</label>
              <input type="text" name="" id="Colonia" required="" />
            </li>
            <li class="form-list__row">
              <label>*Codigo postal</label>
              <input type="text" name="" id="postal" maxlength="6" required="" />
            </li>
            <li class="form-list__row">
              <label>*Estado</label>
              <input type="text" name="" id="Estado" required="" />
            </li>
            <li class="form-list__row">
              <label>*Minicipio</label>
              <input type="text" name="" id="Minicipio" required="" />
              <input type="hidden" name="" id="idubicacion" required="" />
            </li>
            <li class="form-list__row">
              <label>*Pais</label>
              <select id="country" class="form-control" name="country">
              <?php foreach ($countryListAllIsoData as $key => $value) {
              $countryName = $value['name'];
              echo '<option value="'.$countryName.'">'.$countryName.'</option>';
              } ?>
              </select>
            </li>
            <li>
              <input type="text" id="total" type="hidden"></input>
              <button onclick="GrabarDomicilioEnvio()" class="button">Grabar</button>
              <button onclick="CerrarEnvio()"  style="background-color: gray;" class="button">Cancelar</button>
            </li>
          </ul>
      </div> <!-- END: .modal__content -->
    </div> <!-- END: .modal__container -->
  </div> <!-- END: .modal -->

              </div>
              </div>
            </div>

          </div>
        </div>
        <?php else : ?>

          <div class="row" id="AwaitTime" style="
            margin: 0 auto;
            text-align: center;">
            <div id="Cargando" style="display:none; margin: 0 auto;">
            <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
            <h2 id="ProcensaodInfomacion">Procesando información porfavor espere...</h2>
            </div>
            <div class="alert alert-primary" role="alert" id="msjSucces" style="margin: 0 auto; display:none;">
                Se completó correctamente su pago <a href="https://subastas.maxilana.com/myAccount.php"> regresar a información de mi cuenta </a>
              </div>
              <div class="alert alert-danger" role="alert" id="msjError" style="margin: 0 auto;display:none;">
              La solicitud no se pudo completar correctamente <a href="https://subastas.maxilana.com/myAccount.php"> regresar a información de mi cuenta </a>
              </div>
          </div>

        <?php endif ?>

      </div>


    <form action="https://eps.banorte.com/secure3d/Solucion3DSecure.htm" name="payworks_form" id="payworks_form" method="post">
        <input type="hidden" id="Card" name="Card" value="">
        <input type="hidden" id="Expires" name="Expires" value="">
        <input type="hidden" id="Total" name="Total" value="">
        <input type="hidden" id="CardType" name="CardType" value="">
        <input type="hidden" id="MerchantId" name="MerchantId" value="">
        <input type="hidden" id="MerchantName" name="MerchantName" value="">
        <input type="hidden" id="MerchantCity" name="MerchantCity" value="">
        <input type="hidden" id="ForwardPath" name="ForwardPath" value="">
        <input type="hidden" id="Cert3D" name="Cert3D" value="03">
        <input type="hidden" id="Reference3D" name="Reference3D" value="">
        </form>

  </main><!-- End #main -->

<script type="text/javascript">
baseUrl = '<?php echo BASE_URL ?>';
var arrayResponse = <?php echo json_encode($_REQUEST) ?>;
if(arrayResponse.length == 0){
  arrayResponse ={
    Status : null
  }
}

//lista nula o vacía
  if(arrayResponse.Status !== '' && arrayResponse.Status !== null){
  document.getElementById("Cargando").style.display = "block";
  if(arrayResponse.Status == "200"){
    var Response={
          Reference3D: arrayResponse.Reference3D,
          Status: arrayResponse.Status,
          Total:arrayResponse.Total,
          ECI:arrayResponse.ECI,
          XID:arrayResponse.XID,
          CAVV:arrayResponse.CAVV
       };
       $.ajax({    
        data:  Response,      
        type: 'POST',                     
        url: baseUrl+'api/infopagopw2.php',           
        success: function(result) {  
          var Respuesta = JSON.parse(result);
          if(Respuesta.payw_result == "A"){
            document.getElementById("Cargando").style.display = "none";
            document.getElementById('msjSucces').style.display='block';
            
            EnviarCorreo(arrayResponse.Reference3D);
          }else{
            document.getElementById("Cargando").style.display = "none";
            document.getElementById('msjError').style.display='block';
          }
        }    
        });
    }else{
      var Response={
          Reference3D: arrayResponse.Reference3D,
          Status: arrayResponse.Status,
          Total:arrayResponse.Total,
          ECI:arrayResponse.ECI,
          XID:arrayResponse.XID,
          CAVV:arrayResponse.CAVV
       };
       $.ajax({    
        data:  Response,      
        type: 'POST',                     
        url: baseUrl+'api/infopagopw2.php',           
        success: function(result) {  
          document.getElementById('msjError').style.display='block';
        }    
        });

    }
  
}



var entro = 0;
var valuJson = <?php echo json_encode($itemsWon) ?>;

CargarDirecciones(<?php echo $customer['f_customer_id']?>);

    $(document).ready(function(){
        function isNumberKey(evt){
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode > 31 && (charCode < 48 || charCode > 57))
              return false;
          return true;
      }
        $(".btn-script-pass").on('click',function(){
            $.ajax({          
                type: 'POST',
                data: $("#passwordDetails").serialize(),                          
                url: '<?php echo BASE_URL ?>api/changePassword.php',           
                success: function(result) {  
                    datahere =  jQuery.parseJSON(result); 
                    if(datahere.status=="200"){                           
                        $("#bidamount").removeClass('is-invalid');
                        $("#bidamount").addClass('is-valid');
                        confirmOkOnly("green",'Contraseña actualiza',"info",baseUrl+"/myAccount.php")
                    }else{
                        $("#bidamount").addClass('is-invalid');
                        $("#bidamount").removeClass('is-valid');
                        showMsg("inválida",datahere.message,'red');  
                    }                }    
            });
        });

        $(".btn-script-edit").on('click',function(){
          $.ajax({          
            type: 'POST',
            data: $("#formDetails").serialize(),                          
            url: '<?php echo BASE_URL ?>api/updateAccount.php',           
            success: function(result) {  
              datahere =  jQuery.parseJSON(result); 
              if(datahere.status=="200"){                           
                  $("#bidamount").removeClass('is-invalid');
                  $("#bidamount").addClass('is-valid');
                  confirmOkOnly("green",'Actualización exitosa',"info",baseUrl+"/myAccount.php")
              }else{
                  $("#bidamount").addClass('is-invalid');
                  $("#bidamount").removeClass('is-valid');
                  showMsg("inválida",datahere.message,'red');  
              }                
            }    
          });
        });
$('.pay-now').click(function() {
          $('.pay-now').attr('disabled', true);
      
          payform.submit();
        });

    });

    $("#txtTarjeta").bind('keypress', function(event) {
	var regex = new RegExp("^[0-9]+$");
	var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
	if (!regex.test(key)) {
	  event.preventDefault();
	  return false;
	}
  });

  $("#cc_month").bind('keypress', function(event) {
	var regex = new RegExp("^[0-9]+$");
	var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
	if (!regex.test(key)) {
	  event.preventDefault();
	  return false;
	}
  });

  $("#cc_year").bind('keypress', function(event) {
	var regex = new RegExp("^[0-9]+$");
	var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
	if (!regex.test(key)) {
	  event.preventDefault();
	  return false;
	}
  });

  $("#cc_cvc").bind('keypress', function(event) {
	var regex = new RegExp("^[0-9]+$");
	var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
	if (!regex.test(key)) {
	  event.preventDefault();
	  return false;
	}cc_cvc
  });


  
    /******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};

/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {

/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;

/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			exports: {},
/******/ 			id: moduleId,
/******/ 			loaded: false
/******/ 		};

/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);

/******/ 		// Flag the module as loaded
/******/ 		module.loaded = true;

/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}


/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;

/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;

/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/scripts/dist/";

/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ function(module, exports, __webpack_require__) {

	__webpack_require__(1);


/***/ },
/* 1 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';

	var _creditCardType = __webpack_require__(2);

	var _creditCardType2 = _interopRequireDefault(_creditCardType);

	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

	$(document).on('input change', '#input--cc input', function () {
	  var ccNum = $(this).val();
	  var ccType = (0, _creditCardType2.default)(ccNum);

	  if (!ccNum.length || typeof ccType === "undefined" || !ccType.length) {
	    $('#input--cc').removeClass().addClass('creditcard-icon');
	    return;
	  }

	  var creditcardType = ccType[0].type;

	  var ccTypes = {
	    'american-express': 'AE',
	    'master-card': 'MC',
	    'visa': 'VI',
	    'discover': 'DI'
	  };

	  $('#input--cc').removeClass().addClass('creditcard-icon').addClass('creditcard-icon--' + creditcardType); //set creditcard icon

	  // select creditcard type
	  $(".creditcard-type > select").val(ccTypes[creditcardType]);
	  // set the creditcard type <select> to the value entered
	});

/***/ },
/* 2 */
/***/ function(module, exports) {

	'use strict';

	var types = {};
	var VISA = 'visa';
	var MASTERCARD = 'master-card';
	var AMERICAN_EXPRESS = 'american-express';
	var DINERS_CLUB = 'diners-club';
	var DISCOVER = 'discover';
	var JCB = 'jcb';
	var UNIONPAY = 'unionpay';
	var MAESTRO = 'maestro';
	var CVV = 'CVV';
	var CID = 'CID';
	var CVC = 'CVC';
	var CVN = 'CVN';
	var testOrder = [
	  VISA,
	  MASTERCARD,
	  AMERICAN_EXPRESS,
	  DINERS_CLUB,
	  DISCOVER,
	  JCB,
	  UNIONPAY,
	  MAESTRO
	];

	function clone(x) {
	  var prefixPattern, exactPattern, dupe;

	  if (!x) { return null; }

	  prefixPattern = x.prefixPattern.source;
	  exactPattern = x.exactPattern.source;
	  dupe = JSON.parse(JSON.stringify(x));
	  dupe.prefixPattern = prefixPattern;
	  dupe.exactPattern = exactPattern;

	  return dupe;
	}

	types[VISA] = {
	  niceType: 'Visa',
	  type: VISA,
	  prefixPattern: /^4$/,
	  exactPattern: /^4\d*$/,
	  gaps: [4, 8, 12],
	  lengths: [16],
	  code: {
	    name: CVV,
	    size: 3
	  }
	};

	types[MASTERCARD] = {
	  niceType: 'MasterCard',
	  type: MASTERCARD,
	  prefixPattern: /^(5|5[1-5]|2|22|222|222[1-9]|2[3-6]|27[0-1]|2720)$/,
	  exactPattern: /^(5[1-5]|222[1-9]|2[3-6]|27[0-1]|2720)\d*$/,
	  gaps: [4, 8, 12],
	  lengths: [16],
	  code: {
	    name: CVC,
	    size: 3
	  }
	};

	types[AMERICAN_EXPRESS] = {
	  niceType: 'American Express',
	  type: AMERICAN_EXPRESS,
	  prefixPattern: /^(3|34|37)$/,
	  exactPattern: /^3[47]\d*$/,
	  isAmex: true,
	  gaps: [4, 10],
	  lengths: [15],
	  code: {
	    name: CID,
	    size: 4
	  }
	};

	types[DINERS_CLUB] = {
	  niceType: 'Diners Club',
	  type: DINERS_CLUB,
	  prefixPattern: /^(3|3[0689]|30[0-5])$/,
	  exactPattern: /^3(0[0-5]|[689])\d*$/,
	  gaps: [4, 10],
	  lengths: [14],
	  code: {
	    name: CVV,
	    size: 3
	  }
	};

	types[DISCOVER] = {
	  niceType: 'Discover',
	  type: DISCOVER,
	  prefixPattern: /^(6|60|601|6011|65|64|64[4-9])$/,
	  exactPattern: /^(6011|65|64[4-9])\d*$/,
	  gaps: [4, 8, 12],
	  lengths: [16, 19],
	  code: {
	    name: CID,
	    size: 3
	  }
	};

	types[JCB] = {
	  niceType: 'JCB',
	  type: JCB,
	  prefixPattern: /^(2|21|213|2131|1|18|180|1800|3|35)$/,
	  exactPattern: /^(2131|1800|35)\d*$/,
	  gaps: [4, 8, 12],
	  lengths: [16],
	  code: {
	    name: CVV,
	    size: 3
	  }
	};

	types[UNIONPAY] = {
	  niceType: 'UnionPay',
	  type: UNIONPAY,
	  prefixPattern: /^(6|62)$/,
	  exactPattern: /^62\d*$/,
	  gaps: [4, 8, 12],
	  lengths: [16, 17, 18, 19],
	  code: {
	    name: CVN,
	    size: 3
	  }
	};

	types[MAESTRO] = {
	  niceType: 'Maestro',
	  type: MAESTRO,
	  prefixPattern: /^(5|5[06-9]|6\d*)$/,
	  exactPattern: /^5[06-9]\d*$/,
	  gaps: [4, 8, 12],
	  lengths: [12, 13, 14, 15, 16, 17, 18, 19],
	  code: {
	    name: CVC,
	    size: 3
	  }
	};

	function creditCardType(cardNumber) {
	  var type, value, i;
	  var prefixResults = [];
	  var exactResults = [];

	  if (!(typeof cardNumber === 'string' || cardNumber instanceof String)) {
	    return [];
	  }

	  for (i = 0; i < testOrder.length; i++) {
	    type = testOrder[i];
	    value = types[type];

	    if (cardNumber.length === 0) {
	      prefixResults.push(clone(value));
	      continue;
	    }

	    if (value.exactPattern.test(cardNumber)) {
	      exactResults.push(clone(value));
	    } else if (value.prefixPattern.test(cardNumber)) {
	      prefixResults.push(clone(value));
	    }
	  }

	  return exactResults.length ? exactResults : prefixResults;
	}

	creditCardType.getTypeInfo = function (type) {
	  return clone(types[type]);
	};

	creditCardType.types = {
	  VISA: VISA,
	  MASTERCARD: MASTERCARD,
	  AMERICAN_EXPRESS: AMERICAN_EXPRESS,
	  DINERS_CLUB: DINERS_CLUB,
	  DISCOVER: DISCOVER,
	  JCB: JCB,
	  UNIONPAY: UNIONPAY,
	  MAESTRO: MAESTRO
	};

	module.exports = creditCardType;


/***/ }
/******/ ]);
var pw2total;
var pw2usuario;
var pw2email;
var pw2lotsid;
var pw2lotnumber;
var pw2lottitle;

function PagarMaxilana(){


  var Tarjeta = document.getElementById('txtTarjeta').value;
 var ccMonth = document.getElementById('cc_month').value;
 var ccYear = document.getElementById('cc_year').value;
 var nameCard = document.getElementById('nameCard').value;
 var ccv2 = document.getElementById('cc_cvc').value;
 var vencimiento = '';
 var TypeTarjeta = '';
 if(nameCard != ''){
   if(Tarjeta.trim().length == 16){
     if(ccMonth.trim().length == 2){
      if(ccYear.trim().length == 2){
        if(ccv2.trim().length >= 3){
          vencimiento = ccMonth+'/'+ccYear;
          TypeTarjeta = validaTarjeta(Tarjeta);
          TypeTarjeta = TypeTarjeta ? TypeTarjeta : '';
          var numdireccion = document.getElementById('exampleFormControlSelect1').value;
          if(TypeTarjeta !== ''){
            infodata={
              total: pw2total,
              Card : Tarjeta,
              Expires: vencimiento,
              Titular: nameCard,
              CardType : TypeTarjeta.toUpperCase(),
              Ccv2 : ccv2,
              
          };
        $.ajax({    
        data:  infodata,      
        type: 'POST',                     
        url: baseUrl+'api/infodepago.php',           
        success: function(result) {  
          datahere =  jQuery.parseJSON(result);
          ContinuarProceso(datahere,pw2total,Tarjeta,vencimiento,TypeTarjeta.toUpperCase(),ccv2,pw2lotsid,pw2usuario,numdireccion);
        }    
        });
          }else{
            document.getElementById('txtTarjeta').focus();
          }
        }else{document.getElementById('cc_cvc').focus();}
      }else{document.getElementById('cc_year').focus();}
     }else{document.getElementById('cc_month').focus();}
   }else{document.getElementById('txtTarjeta').focus();}
 }else{ document.getElementById('nameCard').focus();}

}
function ValidarTarjeta(total,usuario,email,lotsid,lotnumber,lottitle){
  document.getElementById('exampleModal').style.display='block';
  var totalpay = total;
  document.getElementById('total').value='';
 document.getElementById('txtTarjeta').value='';
 document.getElementById('txtTarjeta').value='';
 document.getElementById('txtTarjeta').value='';
 document.getElementById('txtTarjeta').value='';
 pw2total = totalpay;
 pw2usuario = usuario;
 pw2email = email;
 pw2lotsid = lotsid;
 pw2lotnumber = lotnumber;
 pw2lottitle = lottitle;
 scroolPago();
}

function CerrarPago(){
  document.getElementById('exampleModal').style.display='none';
  document.getElementById('total').value='';
 document.getElementById('txtTarjeta').value='';
 document.getElementById('txtTarjeta').value='';
 document.getElementById('txtTarjeta').value='';
 document.getElementById('txtTarjeta').value='';
}
function validaTarjeta(Tarjeta){
  if (Tarjeta.match(/^4\d{3}-?\d{4}-?\d{4}-?\d{4}$/))
  return "VISA";  
  if (Tarjeta.match(/^5[1-5]\d{2}-?\d{4}-?\d{4}-?\d{4}$/)){
  return "MC";
  }
}
function ContinuarProceso(datahere,pw2total,Tarjeta,vencimiento,CardType,Ccv2,pw2lotsid,pw2usuario,direccion){
  var Info = datahere;
  InfoEnvio={
    id :Info.id,
    costumer:pw2usuario,
    lotid:pw2lotsid,
    total:pw2total,
    dir:direccion
  };
  $.ajax({    
        data:  InfoEnvio,      
        type: 'POST',                     
        url: baseUrl+'api/infodecompra.php',           
        success: function(result) {  
          if(result=="OK"){
            document.getElementById("Card").value=Tarjeta;
            document.getElementById("Expires").value=vencimiento;
            document.getElementById("Total").value=pw2total;
            document.getElementById("CardType").value=CardType.toUpperCase();
            document.getElementById("MerchantId").value= Info.merchanid;
            document.getElementById("MerchantName").value=Info.merchanname;
            document.getElementById("MerchantCity").value=Info.merchancity;
            document.getElementById("Reference3D").value=Info.id;
            document.getElementById("ForwardPath").value= '<?php echo BASE_URL ?>'+'myAccount.php?id='+pw2lotsid+'&userid='+pw2usuario+'&reference='+Info.id+'&amount='+pw2total+'#team';
            document.getElementById("payworks_form").submit();
          }
        }    
        });
}
var direcciones;
var modificacion=0;
var idcte='<?php echo $customer['f_customer_id']?>';
function CargarDirecciones(id){
  InfoEnvio={
    id:id,
  };
  $.ajax({    
        data:  InfoEnvio,      
        type: 'POST',                     
        url: baseUrl+'api/informaciondeenvio.php',           
        success: function(result) {  
          var jsonresult = JSON.parse(result);
          direcciones = jsonresult;
          var container = '';
          var ContainerSelect = '';
          for(var i = 0 ; i < jsonresult.length; i++){
            container=container+'<div class="card" style="width: 30rem;margin:10px;" id="result">';
        container=container+'<div class="card-body">';
        container=container+'<h5 class="card-title">Dirección '+jsonresult[i].idubicacion+'</h5>'
        container=container+'<div class="form-group row">'
        container=container+'<label for="Direccion1" class="col-sm-4 col-form-label">Dirección</label>'
        container=container+'<div class="col-sm-8">'
        container=container+'<label>'+jsonresult[i].direccion+'</label>';
        container=container+'</div>'
        container=container+'</div>'
        container=container+'<div class="form-group row">'
        container=container+'<label for="colonia1" class="col-sm-4 col-form-label">Colonia</label>'
        container=container+'<div class="col-sm-8">'
        container=container+'<label>'+jsonresult[i].colonia+'</label>'
        container=container+'</div>'
        container=container+'</div>'
        container=container+'<div class="form-group row">'
        container=container+'<label for="codigopostal2" class="col-sm-4 col-form-label">Codigo postal</label>'
        container=container+'<div class="col-sm-8">'
        container=container+'<label>'+jsonresult[i].codigopostal+'</label>'
        container=container+'</div>'
        container=container+'</div>'
        container=container+'<div class="form-group row">'
        container=container+'<label for="Estado2" class="col-sm-4 col-form-label">Estado</label>'
        container=container+'<div class="col-sm-8">'
        container=container+'<label>'+jsonresult[i].estado+'</label>'
        container=container+'</div>'
        container=container+'</div>'
        container=container+'<div class="form-group row">'
        container=container+'<label for="municipio2" class="col-sm-4 col-form-label">Municipio</label>'
        container=container+'<div class="col-sm-8">'
        container=container+'<label>'+jsonresult[i].municipio+'</label>'
        container=container+'</div>'
        container=container+'</div>'
        container=container+'<div class="form-group row">'
        container=container+'<label for="pais2" class="col-sm-4 col-form-label">Pais</label>'
        container=container+'<div class="col-sm-8">'
        container=container+'<label>'+jsonresult[i].pais+'</label>'
        container=container+'</div>'
        container=container+'</div>';
        container=container+'<a style="color:white;" class="btn btn-primary" onclick="ModalEnvio(1,'+jsonresult[i].usuarioid+','+jsonresult[i].idubicacion+')">Editar</a></div></div>';
           
        
        ContainerSelect = ContainerSelect+'<option value="'+jsonresult[i].idubicacion+'">'+jsonresult[i].direccion+','+jsonresult[i].colonia+','+jsonresult[i].codigopostal+','+jsonresult[i].estado+'</option>';
      }
        if(jsonresult.length == 1){
        container=container+'<div class="card" style="margin-left:20px;" style="width: 18rem;">'
        container=container+'<div class="card-body">'
        container=container+'<h5 class="card-title">Agregar dirección</h5>'
        container=container+'<a style="color:white;" class="btn btn-primary" onclick="ModalEnvio(2,'+jsonresult[0].usuarioid+',2)">Add</a>'
        container=container+'</div>'
        container=container+'</div>'
        }

        document.getElementById('exampleFormControlSelect1').innerHTML=ContainerSelect;
        document.getElementById('informacionenvio').innerHTML=container;
      }
    });
}
function ModalEnvio(option,usuario,id){

  if(option == '1'){
    modificacion = 1;
    for(var i = 0 ; i < direcciones.length; i++){
      if(id == direcciones[i].idubicacion){
        modificacion=1;
        document.getElementById('Direccion').value=direcciones[i].direccion
        document.getElementById('Colonia').value=direcciones[i].colonia
        document.getElementById('postal').value=direcciones[i].codigopostal
        document.getElementById('Estado').value=direcciones[i].estado
        document.getElementById('Minicipio').value=direcciones[i].municipio
        document.getElementById('idubicacion').value=id;
        $("#country option[value="+direcciones[i].pais+"").attr("selected",true);
       
        break;
      }
    }
  
  }else{
        modificacion=0;
        document.getElementById('Direccion').value='';
        document.getElementById('Colonia').value='';
        document.getElementById('postal').value='';
        document.getElementById('Estado').value='';
        document.getElementById('Minicipio').value='';
        document.getElementById("country").selectedIndex=0;
        document.getElementById('idubicacion').value=id;
  }
  
  document.getElementById('ModalEnvio').style.display="block";
  scrool();
}
function scrool(){
  var elmnt = document.getElementById("ModalEnvio");
  elmnt.scrollIntoView(true);
}

function scroolPago(){
  var elmnt = document.getElementById("exampleModal");
  elmnt.scrollIntoView(true);
}
function GrabarDomicilioEnvio(){
    dir =  document.getElementById('Direccion').value;
    col = document.getElementById('Colonia').value;
    cp = document.getElementById('postal').value;
    est = document.getElementById('Estado').value;
    mun = document.getElementById('Minicipio').value;
    pais= document.getElementById("country").value;
    idubi= document.getElementById('idubicacion').value;
    if(validarCampos(dir,col,cp,est,mun,pais)){
      if(modificacion == 1){
        ModificarDireccion(modificacion,idubi,dir,col,cp,est,mun,pais);
      }else{
        ModificarDireccion(modificacion,idubi,dir,col,cp,est,mun,pais);
      }
    }else{
      showMsg("inválida","Favor de validar todos los campos",'red'); 
    }
  
}
function validarCampos(dir,col,cp,est,mun,pais){
    bandera = true;
    if(dir.trim().length ==0){
      bandera = false;
    }
    if(col.trim().length ==0){
      bandera = false;
    }
    if(cp.trim().length ==0 || cp.trim().length < 5){
      bandera = false;
    }
    if(est.trim().length ==0){
      bandera = false;
    }
    if(mun.trim().length ==0){
      bandera = false;
    }
    if(pais.trim().length ==0){
      bandera = false;
    }
    return bandera;
}
function ModificarDireccion(modificacion,idubi,dir,col,cp,est,mun,pais){
  InfoEnvio={
    option:modificacion,
    id :idubi,
    cliente: idcte,
    direccion:dir,
    colonia:col,
    codigopostal:cp,
    estado:est,
    municipio:mun,
    country:pais
  };
  $.ajax({    
        data:  InfoEnvio,      
        type: 'POST',                     
        url: baseUrl+'api/grabardireccion.php',           
        success: function(result) {
          if(result=="OK"){
            confirmOkOnly("green",'Se actualizó la información correctamente',"info",baseUrl+"/myAccount.php")
          }
        }    
        });
}
$("#Minicipio").bind('keypress', function(event) {
	var regex = new RegExp("^[a-zA-Z ]+$");
	var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
	if (!regex.test(key)) {
	  event.preventDefault();
	  return false;
	}
  });

  $("#Estado").bind('keypress', function(event) {
	var regex = new RegExp("^[a-zA-Z ]+$");
	var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
	if (!regex.test(key)) {
	  event.preventDefault();
	  return false;
	}
  });
  $("#nameCard").bind('keypress', function(event) {
	var regex = new RegExp("^[a-zA-Z ]+$");
	var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
	if (!regex.test(key)) {
	  event.preventDefault();
	  return false;
	}
  });
  
  $("#postal").bind('keypress', function(event) {
	var regex = new RegExp("^[0-9]+$");
	var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
	if (!regex.test(key)) {
	  event.preventDefault();
	  return false;
	}
  });
  $("#txtTarjeta").bind('keypress', function(event) {
	var regex = new RegExp("^[0-9]+$");
	var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
	if (!regex.test(key)) {
	  event.preventDefault();
	  return false;
	}
  });
  $("#cc_month").bind('keypress', function(event) {
	var regex = new RegExp("^[0-9]+$");
	var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
	if (!regex.test(key)) {
	  event.preventDefault();
	  return false;
	}
  });
  $("#cc_year").bind('keypress', function(event) {
	var regex = new RegExp("^[0-9]+$");
	var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
	if (!regex.test(key)) {
	  event.preventDefault();
	  return false;
	}
  });
  $("#cc_cvc").bind('keypress', function(event) {
	var regex = new RegExp("^[0-9]+$");
	var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
	if (!regex.test(key)) {
	  event.preventDefault();
	  return false;
	}
  });
  function EnviarCorreo(Reference3D){
    infoCorreo={
      id:Reference3D
            };
            $.ajax({    
            data:  infoCorreo,      
            type: 'POST',                     
            url: baseUrl+'api/enviarcorreo.php',           
            success: function(result) {  
        
            }    
            });
  }
  self.addEventListener('install', function(event) {
  event.waitUntil(
    caches.open(cacheName).then(function(cache) {
      return setOfCachedUrls(cache).then(async function(cachedUrls) {
        const cacheKeys = Array.from(urlsToCacheKeys.values());
        const chunckSize = 20;
        const cacheKeysChunks = new Array(Math.ceil(cacheKeys.length / chunckSize)).fill().map(_ => {
          return cacheKeys.splice(0, chunckSize);
        });
        for (let cacheKeys of cacheKeysChunks) {
          await Promise.all(
            cacheKeys.map(function(cacheKey) {
              // If we don't have a key matching url in the cache already, add it.
              if (!cachedUrls.has(cacheKey)) {
                var request = new Request(cacheKey, {credentials: 'same-origin'});
                return fetch(request).then(function(response) {
                  // Bail out of installation unless we get back a 200 OK for
                  // every request.
                  if (!response.ok) {
                    throw new Error('Request for ' + cacheKey + ' returned a ' +
                      'response with status ' + response.status);
                  }

                  return cleanResponse(response).then(function(responseToCache) {
                    return cache.put(cacheKey, responseToCache);
                  });
                });
              }
            })
          );
        }
      });
    }).then(function() {

      // Force the SW to transition from installing -> active state
      return self.skipWaiting();

    })
  );
});
function validarEntero(e){
      var valor = e.value;
      if(valor !== ""){
        e.value=parseInt(valor);
      }
    }

</script>




