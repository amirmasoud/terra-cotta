import { mount } from '@vue/test-utils'
import Group from '@/components/svg/Group'

describe('Group', () => {
  const wrapper = mount(Group)

  it('is a Vue instance', () => {
    expect(wrapper).toBeTruthy()
  })

  it('renders correctly', () => {
    expect(wrapper.element).toMatchSnapshot()
  })
})
