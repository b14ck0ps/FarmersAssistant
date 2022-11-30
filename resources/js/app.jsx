import "./bootstrap";

import React from "react";
import ReactDOM from "react-dom";
import Main from "./Main";

if (document.getElementById("app")) {
    ReactDOM.render(
        <React.StrictMode>
            <Main />
        </React.StrictMode>,
        document.getElementById("app")
    );
}
