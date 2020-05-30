import { mount } from '@vue/test-utils'
import Safe from '@/components/svg/Safe'

describe('Safe', () => {
  const wrapper = mount(Safe)

  it('is a Vue instance', () => {
    expect(wrapper).toBeTruthy()
  })

  it('renders correctly', () => {
    expect(wrapper.element).toMatchSnapshot()
  })
})
