import { mount } from '@vue/test-utils'
import Close from '@/components/svg/Close'

describe('Close', () => {
  const wrapper = mount(Close)

  it('is a Vue instance', () => {
    expect(wrapper).toBeTruthy()
  })

  it('renders correctly', () => {
    expect(wrapper.element).toMatchSnapshot()
  })
})
