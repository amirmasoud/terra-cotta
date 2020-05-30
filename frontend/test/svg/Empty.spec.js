import { mount } from '@vue/test-utils'
import Empty from '@/components/svg/Empty'

describe('Empty', () => {
  const wrapper = mount(Empty)

  it('is a Vue instance', () => {
    expect(wrapper).toBeTruthy()
  })

  it('renders correctly', () => {
    expect(wrapper.element).toMatchSnapshot()
  })
})
