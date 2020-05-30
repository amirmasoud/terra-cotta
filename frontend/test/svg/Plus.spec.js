import { mount } from '@vue/test-utils'
import Plus from '@/components/svg/Plus'

describe('Plus', () => {
  const wrapper = mount(Plus)

  it('is a Vue instance', () => {
    expect(wrapper).toBeTruthy()
  })

  it('renders correctly', () => {
    expect(wrapper.element).toMatchSnapshot()
  })
})
