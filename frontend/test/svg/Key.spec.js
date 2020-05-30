import { mount } from '@vue/test-utils'
import Key from '@/components/svg/Key'

describe('Key', () => {
  const wrapper = mount(Key)

  it('is a Vue instance', () => {
    expect(wrapper).toBeTruthy()
  })

  it('renders correctly', () => {
    expect(wrapper.element).toMatchSnapshot()
  })
})
