import { mount } from '@vue/test-utils'
import Button from '../components/Button'

describe('Button', () => {
  const wrapper = mount(Button, {
    propsData: {
      type: 'secondary',
      nativeType: 'button',
      loading: true,
      block: true,
      large: true
    }
  })

  test('renders correctly', () => {
    expect(wrapper.isVueInstance()).toBeTruthy()
    expect(wrapper.html()).toMatchSnapshot()
    wrapper.setProps({ loading: false })
    expect(wrapper.html()).toMatchSnapshot()
  })

  it('has a button', () => {
    expect(wrapper.contains('button')).toBe(true)
  })
})
