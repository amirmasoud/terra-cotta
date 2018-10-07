import { mount, createLocalVue } from '@vue/test-utils'
import Checkbox from '../components/Checkbox'

describe('Checkbox', () => {
  const wrapper = mount(Checkbox)

  test('renders correctly', () => {
    expect(wrapper.isVueInstance()).toBeTruthy()
    expect(wrapper.html()).toMatchSnapshot()
  })

  it('has checkbox input', () => {
    expect(wrapper.html()).toContain('type="checkbox"')
  })
})
