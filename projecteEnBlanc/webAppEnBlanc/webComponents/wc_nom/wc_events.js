// Variable global
var mensaje = "He sido seleccionado, soy la variable global";

function myFunction() {
    document.getElementById("plato1").style = "background-color: yellow";
    document.getElementById("info").innerHTML = "Texto añadido al pulsar el plato 1";
    alert(mensaje);
}

function myFunction2() {
    document.getElementById("plato2").style = "background-color: green";
    alert(mensaje);
}

function PasarValor() {
    document.getElementById("nombre2").value = document.getElementById("nombre1").value;
}

customElements.define("first-element", class extends HTMLElement {
    constructor() {
        super();
        this.attachShadow({ mode: "open" });
    }

    handleEvent(event) {
        if (event.type === "click") {
            const MessageEvent = new CustomEvent("message", {
                detail: { from: "Manz", message: "Hello!" },
                bubbles: true,
                composed: true
            });
            this.dispatchEvent(MessageEvent);
        }
    }

    connectedCallback() {
        this.shadowRoot.innerHTML = `<button>Send message!</button>`;
        this.shadowRoot.querySelector("button").addEventListener("click", this);
    }
});

/** SecondElement component **/
customElements.define("second-element", class extends HTMLElement {
    constructor() {
        super();
        this.attachShadow({ mode: "open" });
    }

    handleEvent(event) {
        if (event.type === "message") {
            event.detail.from = "Robot";
            const data = event.detail;
            this.shadowRoot.innerHTML = `
        <div>
          From ${data.from}:
          <span style="color:red">${data.message}</span>
        </div>
      `;
        }
    }

    connectedCallback() {
        this.shadowRoot.innerHTML = `<div>No messages</button>`;
        document.addEventListener("message", this);
    }
});