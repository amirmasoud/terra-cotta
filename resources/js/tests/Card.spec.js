import { mount, createLocalVue } from '@vue/test-utils'
import Card from '../components/Card'
import BootstrapVue from 'bootstrap-vue'

describe('Card', () => {
  const localVue = createLocalVue()
  localVue.use(BootstrapVue)

  const wrapper = mount(Card, {localVue})

  test('renders correctly', () => {
    expect(wrapper.isVueInstance()).toBeTruthy()
    expect(wrapper.html()).toMatchSnapshot()
  })

  it('has card body', () => {
    expect(wrapper.html()).toContain('<div class="card-body"></div>')
  })
})
