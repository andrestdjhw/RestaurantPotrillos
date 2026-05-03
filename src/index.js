import Person from "./scripts/Person"
import ExampleReactComponent from "./scripts/ExampleReactComponent"
import React from "react"
import ReactDOM from "react-dom/client"
import Navbar from "./scripts/Navbar"
import Footer from "./scripts/Footer"


const person1 = new Person("Brad")
if (document.querySelector("#render-react-example-here")) {
  const root = ReactDOM.createRoot(document.querySelector("#render-react-example-here"))
  root.render(<ExampleReactComponent />)
}

if (document.querySelector("#render-navbar-here")) {
  const root = ReactDOM.createRoot(document.querySelector("#render-navbar-here"))
  root.render(<Navbar />)
}

if (document.querySelector("#render-footer-here")) {
  const root = ReactDOM.createRoot(document.querySelector("#render-footer-here"))
  root.render(<Footer />)
}