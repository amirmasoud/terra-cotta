import { mount } from '@vue/test-utils'
import Edit from '@/components/svg/Edit'

describe('Edit', () => {
  const wrapper = mount(Edit)

  it('is a Vue instance', () => {
    expect(wrapper).toBeTruthy()
  })

  it('renders correctly', () => {
    expect(wrapper.element).toMatchSnapshot()
  })
})
