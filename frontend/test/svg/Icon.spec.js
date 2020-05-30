import { mount } from '@vue/test-utils'
import Icon from '@/components/svg/Icon'

describe('Icon', () => {
  const wrapper = mount(Icon)

  it('is a Vue instance', () => {
    expect(wrapper).toBeTruthy()
  })

  it('renders correctly', () => {
    expect(wrapper.element).toMatchSnapshot()
  })
})
