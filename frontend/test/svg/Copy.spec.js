import { mount } from '@vue/test-utils'
import Copy from '@/components/svg/Copy'

describe('Copy', () => {
  const wrapper = mount(Copy)

  it('is a Vue instance', () => {
    expect(wrapper).toBeTruthy()
  })

  it('renders correctly', () => {
    expect(wrapper.element).toMatchSnapshot()
  })
})
