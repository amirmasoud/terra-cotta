import { mount } from '@vue/test-utils'
import Eye from '@/components/svg/Eye'

describe('Eye', () => {
  const wrapper = mount(Eye)

  it('is a Vue instance', () => {
    expect(wrapper).toBeTruthy()
  })

  it('renders correctly', () => {
    expect(wrapper.element).toMatchSnapshot()
  })
})
