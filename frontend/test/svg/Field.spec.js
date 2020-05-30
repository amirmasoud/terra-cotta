import { mount } from '@vue/test-utils'
import Field from '@/components/svg/Field'

describe('Field', () => {
  const wrapper = mount(Field)

  it('is a Vue instance', () => {
    expect(wrapper).toBeTruthy()
  })

  it('renders correctly', () => {
    expect(wrapper.element).toMatchSnapshot()
  })
})
