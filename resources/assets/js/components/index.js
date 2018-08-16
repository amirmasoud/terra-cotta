import Vue from 'vue'
import Card from './Card'
import Child from './Child'
import Button from './Button'
import Checkbox from './Checkbox'
import ComponentLoading from './ComponentLoading'
import { HasError, AlertError, AlertSuccess } from 'vform'

import Submit from './content/Submit'

// Components that are registered globaly.
[
  Card,
  Child,
  Button,
  Checkbox,
  ComponentLoading,
  HasError,
  AlertError,
  AlertSuccess,

  Submit,
].forEach(Component => {
  Vue.component(Component.name, Component)
})
