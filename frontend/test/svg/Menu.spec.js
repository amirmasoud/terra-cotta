import { mount } from '@vue/test-utils'
import Menu from '@/components/svg/Menu'

describe('Menu', () => {
  const wrapper = mount(Menu)

  it('is a Vue instance', () => {
    expect(wrapper).toBeTruthy()
  })

  it('renders correctly', () => {
    expect(wrapper.element).toMatchSnapshot()
  })
})
