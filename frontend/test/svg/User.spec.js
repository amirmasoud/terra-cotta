import { mount } from '@vue/test-utils'
import User from '@/components/svg/User'

describe('User', () => {
  const wrapper = mount(User)

  it('is a Vue instance', () => {
    expect(wrapper).toBeTruthy()
  })

  it('renders correctly', () => {
    expect(wrapper.element).toMatchSnapshot()
  })
})
