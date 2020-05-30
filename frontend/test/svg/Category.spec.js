import { mount } from '@vue/test-utils'
import AccountDropdown from '@/components/svg/Category'

describe('AccountDropdown', () => {
  it('is a Vue instance', () => {
    expect(wrapper).toBeTruthy()
  })

  it('renders correctly', () => {
    const wrapper = mount(AccountDropdown)
    expect(wrapper.element).toMatchSnapshot()
  })
})
