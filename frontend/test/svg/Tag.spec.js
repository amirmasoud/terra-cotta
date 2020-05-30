import { mount } from '@vue/test-utils'
import Tag from '@/components/svg/Tag'

describe('Tag', () => {
  const wrapper = mount(Tag)

  it('is a Vue instance', () => {
    expect(wrapper).toBeTruthy()
  })

  it('renders correctly', () => {
    expect(wrapper.element).toMatchSnapshot()
  })
})
