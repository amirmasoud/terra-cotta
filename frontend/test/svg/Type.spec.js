import { mount } from '@vue/test-utils'
import Type from '@/components/svg/Type'

describe('Type', () => {
  const wrapper = mount(Type)

  it('is a Vue instance', () => {
    expect(wrapper).toBeTruthy()
  })

  it('renders correctly', () => {
    expect(wrapper.element).toMatchSnapshot()
  })
})
