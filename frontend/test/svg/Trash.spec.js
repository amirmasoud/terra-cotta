import { mount } from '@vue/test-utils'
import Trash from '@/components/svg/Trash'

describe('Trash', () => {
  const wrapper = mount(Trash)

  it('is a Vue instance', () => {
    expect(wrapper).toBeTruthy()
  })

  it('renders correctly', () => {
    expect(wrapper.element).toMatchSnapshot()
  })
})
